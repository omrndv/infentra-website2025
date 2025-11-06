<?php

namespace App\Http\Controllers\Frontend;

use App\Foundations\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Enums\UploadFileType;
use App\Facades\File;
use Illuminate\Support\Facades\Auth;

class ReuploadController extends Controller
{
    public function index(Team $team)
    {
        $team->load('leader', 'members', 'payment');
        return view('pages.frontend.reupload', compact('team'));
    }

    public function store(Request $request, Team $team)
    {
        $team->load('leader', 'members', 'payment');

        $rules = [
            'leader_card'   => 'nullable|image|max:2048',
            'payment_proof' => 'nullable|image|max:2048',
        ];

        foreach ($team->members as $i => $member) {
            $rules["member_card_{$i}"] = 'nullable|image|max:2048';
        }

        $validated = $request->validate($rules);

        // Upload Leader
        if ($request->hasFile('leader_card')) {
            $team->leader->card = File::saveSingleFile(UploadFileType::IMAGE, $request->file('leader_card'));
            $team->leader->save();
        }

        // Upload Members
        foreach ($team->members as $i => $member) {
            if ($request->hasFile("member_card_{$i}")) {
                $member->card = File::saveSingleFile(UploadFileType::IMAGE, $request->file("member_card_{$i}"));
                $member->save();
            }
        }

        // Upload Payment Proof
        if ($request->hasFile('payment_proof')) {
            $team->payment->proof = File::saveSingleFile(UploadFileType::FILE, $request->file('payment_proof'));
            $team->payment->status = 'pending';
            $team->payment->save();
        }

        // Pastikan user tetap punya role "team"
        $user = Auth::user();
        if ($user && !$user->hasRole('team')) {
            $user->syncRoles(['team']);
        }

        // Redirect ke dashboard tim (resources/views/pages/team/dashboard.blade.php)
        return redirect()->route('frontend.team.dashboard')
            ->with('success', 'Data berhasil diunggah ulang. Silakan tunggu verifikasi ulang dari admin.');
    }
}
