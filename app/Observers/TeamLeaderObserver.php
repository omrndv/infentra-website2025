<?php

namespace App\Observers;

use App\Enums\UploadFileType;
use App\Facades\File;
use App\Models\TeamLeader;

class TeamLeaderObserver
{
    /**
     * Handle the TeamLeader "creating" event.
     */
    public function creating(TeamLeader $teamLeader): void
    {
        if ($teamLeader->card instanceof \Illuminate\Http\UploadedFile) {
            $teamLeader->card = File::saveSingleFile(UploadFileType::IMAGE, $teamLeader->card);
        }
    }

    /**
     * Handle the TeamLeader "updating" event.
     */
    public function updating(TeamLeader $teamLeader): void
    {
        // Hanya proses jika field 'card' berubah
        if ($teamLeader->isDirty('card')) {
            $oldCard = $teamLeader->getOriginal('card');

            // Jika ada file baru
            if ($teamLeader->card instanceof \Illuminate\Http\UploadedFile) {
                $teamLeader->card = File::updateSingleFile(
                    UploadFileType::IMAGE,
                    $teamLeader->card,
                    $oldCard
                );
            }
            // Jika user mengosongkan field card, hapus file lama
            elseif (empty($teamLeader->card) && $oldCard) {
                File::deleteFile(UploadFileType::IMAGE, $oldCard);
                $teamLeader->card = null;
            }
        }
    }

    /**
     * Handle the TeamLeader "deleting" event.
     */
    public function deleting(TeamLeader $teamLeader): void
    {
        if ($teamLeader->card) {
            File::deleteFile(UploadFileType::IMAGE, $teamLeader->card);
        }
    }
}
