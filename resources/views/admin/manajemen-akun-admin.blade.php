<div class="container my-4">
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="bi bi-people-fill me-2"></i> Manajemen Akun</h4>
        </div>
        <div class="card-body">
            @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: "{{ session('success') }}",
                    showConfirmButton: false,
                    timer: 2000
                })
            </script>
            @endif

            @if (session('error'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: "{{ session('error') }}",
                })
            </script>
            @endif

            <div class="table-responsive mt-3">
                <table class="table table-hover table-bordered align-middle text-center fade-in-content">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 60px">No</th>
                            <th>Nama Kampus</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Nomor Telepon</th>
                            <th>Koordinator Program</th>
                            <th style="width: 180px">Email Koordiantor</th>
                            <th style="width: 180px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($akun as $index => $a)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td style="width: 300px" class="fw-semibold text-start"><i class="bi bi-bank2 me-2 text-primary"></i>{{ $a->nama_kampus }}</td>
                            <td style="width: 300px"><i class="bi bi-envelope-fill me-1 text-secondary"></i>{{ $a->email_kampus }}</td>
                            <td>
                                <span class="badge rounded-pill px-3 py-2
                                    {{ $a->role === 'admin' ? 'bg-success' : ($a->role === 'kampus' ? 'bg-primary' : 'bg-warning text-dark') }}">
                                    <i class="bi bi-person-badge me-1"></i>{{ ucfirst($a->role) }}
                                </span>
                            </td>
                            <td style="width: 180px"><i class="bi bi-telephone-fill me-1 text-success"></i>{{ $a->nomor_telepon }}</td>
                            <td style="width: 180px"><i class="bi bi-person-fill-gear me-1 text-info"></i>{{ $a->koordinator_program }}</td>
                            <td style="width: 250px"><i class="bi bi-envelope-at-fill me-1 text-primary"></i>{{ $a->email_koordinator }}</td>
                            <td style="width: 180px">
                                <!-- Tombol Edit -->
                                <button class="btn btn-sm btn-warning me-1" data-bs-toggle="modal" data-bs-target="#editModal{{ $a->id }}">
                                    <i class="bi bi-pencil-square"></i>
                                </button>

                                <!-- Tombol Hapus -->
                                <form id="deleteForm{{ $a->id }}" action="{{ route('akun.hapus', $a->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger me-1" onclick="confirmDelete{{ $a->id }}()">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>

                                <!-- Tombol Reset Password -->
                                <form id="resetForm{{ $a->id }}" action="{{ route('admin.users.reset-password', $a->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    <button type="button" class="btn btn-sm btn-info text-white" onclick="confirmReset{{ $a->id }}()">
                                        <i class="bi bi-arrow-repeat"></i>
                                    </button>
                                </form>
                            </td>

                            <!-- Script Konfirmasi -->
                            <script>
                                function confirmReset{{ $a->id }}() {
                                    Swal.fire({
                                        title: 'Yakin reset password?',
                                        text: "Password untuk {{ $a->nama_kampus }} akan direset ke default.",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Ya, reset!'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            document.getElementById('resetForm{{ $a->id }}').submit();
                                        }
                                    })
                                }

                                function confirmDelete{{ $a->id }}() {
                                    Swal.fire({
                                        title: 'Yakin hapus akun?',
                                        text: "Data akun {{ $a->nama_kampus }} tidak bisa dikembalikan!",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Ya, hapus!'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            document.getElementById('deleteForm{{ $a->id }}').submit();
                                        }
                                    })
                                }
                            </script>
                        </tr>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="editModal{{ $a->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $a->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0 shadow-lg rounded-3">
                                    <form action="{{ route('akun.update', $a->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title"><i class="bi bi-pencil-square me-2"></i>Edit Akun</h5>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Nama Kampus</label>
                                                <input type="text" name="nama_kampus" class="form-control" value="{{ $a->nama_kampus }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Email Kampus</label>
                                                <input type="email" name="email_kampus" class="form-control" value="{{ $a->email_kampus }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Role</label>
                                                <select name="role" class="form-select" required>
                                                    <option value="admin" {{ $a->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                                    <option value="kampus" {{ $a->role == 'kampus' ? 'selected' : '' }}>Kampus</option>
                                                    <option value="reviewer" {{ $a->role == 'reviewer' ? 'selected' : '' }}>Reviewer</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">No. Telepon</label>
                                                <input type="text" name="nomor_telepon" class="form-control" value="{{ $a->nomor_telepon }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Koordinator Program</label>
                                                <input type="text" name="koordinator_program" class="form-control" value="{{ $a->koordinator_program }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Email Koordinator</label>
                                                <input type="email" name="email_koordinator" class="form-control"
                                                       value="{{ $a->email_koordinator }}" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                <i class="bi bi-x-circle"></i> Batal
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="bi bi-save"></i> Simpan
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                <i class="bi bi-exclamation-circle me-2"></i>Tidak ada akun yang terdaftar.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
