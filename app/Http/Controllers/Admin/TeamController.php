<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\TeamDataTable;
use App\Foundations\Controller;
use App\Http\Requests\Admin\TeamRequest;
use App\Services\Admin\TeamService;
use Illuminate\Http\Request;
use Throwable;

class TeamController extends Controller
{
    public function __construct(
        private TeamService $service
    ) {}

    public function index(TeamDataTable $dataTable)
    {
        try {
            return $dataTable->render('pages.admin.teams.index', $this->service->index());
        } catch (Throwable $th) {
            return $this->redirectError($th);
        }
    }

    public function show(string $id)
    {
        try {
            $data = $this->service->show($id);

            if (!$data || !isset($data['team'])) {
                abort(404, 'Tim tidak ditemukan');
            }

            return view('pages.admin.teams.show', $data);
        } catch (Throwable $th) {
            return $this->redirectError($th);
        }
    }

    public function update(TeamRequest $request, string $id)
    {
        try {
            $data = $request->validated();
            $this->service->update($data, $id);

            return to_route('admin.team.index');
        } catch (Throwable $th) {
            return $this->redirectError($th);
        }
    }

    public function destroy(string $id)
    {
        try {
            $this->service->destroy($id);
            toast('Data tim berhasil dihapus.', 'success');
            return to_route('admin.team.index');
        } catch (Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
