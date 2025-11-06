<?php

namespace App\Services\Admin;

use App\Contracts\Models;
use App\Enums\PaymentStatus;
use App\Foundations\Service;
use App\Notifications\TeamApproved;
use App\Notifications\TeamRejected;

class TeamService extends Service
{
    public function __construct(
        private Models\UserInterface $userInterface,
        private Models\TeamInterface $teamInterface,
        private Models\TeamLeaderInterface $teamLeaderInterface,
        private Models\PaymentInterface $paymentInterface,
        private Models\CompetitionInterface $competitionInterface,
    ) {}

    public function index(): array
    {
        $competitions = $this->competitionInterface->all(['id', 'name']);
        return compact('competitions');
    }

    public function show(string $id): ?array
    {
        $status = PaymentStatus::class;

        $team = $this->teamInterface->findById($id, [
            'id',
            'competition_id',
            'name',
            'institution'
        ], [
            'competition:id,level_id,whatsapp_group',
            'competition.level:id,level',
            'payment:id,team_id,method_id,proof,status',
            'payment.method:id,name,owner,number',
            'leader:id,user_id,team_id,name,phone,card',
            'leader.user:id,email',
            'members:team_id,name,card',
            'companion:id,team_id,name,card'
        ]);

        if (!$team) {
            return null; // biar Controller bisa abort(404)
        }

        return compact('team', 'status');
    }

    public function update(array $request, string $id): void
    {
        try {
            $payment = $this->paymentInterface->findByCustomId([['team_id', '=', $id]], ['id', 'team_id']);
            if (is_null($payment)) {
                toast('ID tim tidak ditemukan pada sistem atau belum melakukan pembayaran', 'error');
                return;
            }

            $this->paymentInterface->update($payment->id, ['status' => $request['status']]);
            $user = $this->userInterface->findByCustomId([['email', '=', $request['email']]]);

            if ($request['status'] == PaymentStatus::APPROVE->value) {
                $user?->notify(new \App\Notifications\TeamApproved($request['whatsapp_link'] ?? 'https://chat.whatsapp.com/xxxxx'));
                toast('Tim disetujui dan email telah dikirim', 'success');
            } else {
                $reason = $request['reason'] ?? 'Tidak memenuhi syarat pendaftaran.';
                $user?->notify(new \App\Notifications\TeamRejected($reason));
                toast('Tim ditolak dan email alasan telah dikirim', 'error');
            }
        } catch (\Throwable $th) {
            toast('Status tim gagal diubah', 'error');
            throw $th;
        }
    }


    public function destroy(string $id): void
    {
        $teamLeader = $this->teamLeaderInterface->findByCustomId([['team_id', '=', $id]], ['id', 'team_id', 'user_id']);

        $this->teamInterface->deleteById($id);

        if (isset($teamLeader) && $teamLeader?->user_id) {
            $this->userInterface->deleteById($teamLeader->user_id);
        }

        toast('Tim berhasil dihapus', 'success');
    }
}
