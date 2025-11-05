<?php

namespace Modules\Storage;

use App\Enums\ReportLogType;
use App\Enums\UploadFileType;
use App\Traits\SystemLog;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileManager
{
    use SystemLog;

    private static string $unknownPath = 'unknown';

    private function storageFolder(UploadFileType $type = UploadFileType::IMAGE): string
    {
        $folder = match ($type) {
            UploadFileType::IMAGE => 'photos',
            UploadFileType::FILE  => 'payments',
            UploadFileType::SETTING => 'settings',
            default => self::$unknownPath,
        };

        if (!Storage::disk('public')->exists($folder)) {
            Storage::disk('public')->makeDirectory($folder);
        }

        return $folder;
    }

    private function transformName(UploadFileType $type, string $file): string
    {
        $baseUrl = asset('storage');
        $folder = match ($type) {
            UploadFileType::IMAGE   => 'photos',
            UploadFileType::FILE    => 'payments',
            UploadFileType::SETTING => 'settings',
            default                 => self::$unknownPath,
        };

        return $baseUrl . '/' . $folder . '/' . $file;
    }

    private function parseImage(string $file): string
    {
        return basename(parse_url($file, PHP_URL_PATH) ?? '');
    }

    private function putFile(UploadFileType $type, UploadedFile $file): string
    {
        $user = auth('web')->user();
        $clientCode = $user
            ? $user->id . '_' . $user->created_at->format('dmY')
            : rand(1, 999) . '_' . date('His');

        $fileName = uniqid() . '_' . date('dmY') . '_' . $clientCode . '.' . $file->getClientOriginalExtension();
        $folder = $this->storageFolder($type);

        $file->storeAs($folder, $fileName, 'public');

        return $this->transformName($type, $fileName);
    }

    public function saveSingleFile(UploadFileType $type, ?UploadedFile $file): ?string
    {
        if (is_null($file)) return null;

        return $this->putFile($type, $file);
    }

    public function updateSingleFile(UploadFileType $type, $file, ?string $oldFile): ?string
    {
        if (!$file instanceof UploadedFile) {
            return $file ?? $oldFile;
        }

        if (!empty($oldFile)) {
            $this->deleteFile($type, $oldFile);
        }

        return $this->putFile($type, $file);
    }

    public function deleteFile(UploadFileType $type, string $file): bool
    {
        $parsedFile = $this->parseImage($file);
        $folder = $this->storageFolder($type);

        if (!Storage::disk('public')->exists($folder . '/' . $parsedFile)) {
            return false;
        }

        Storage::disk('public')->delete($folder . '/' . $parsedFile);
        return true;
    }
}
