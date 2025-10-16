<div class="card shadow-sm border-0 rounded-4 mt-4">
    <div class="card-body p-4">
      <h4 class="mb-3">Tambah Berita</h4>

      @if(session('ok')) <div class="alert alert-success">{{ session('ok') }}</div> @endif

      <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data" class="mb-4">
        @csrf
        <div class="mb-3">
          <label class="form-label">Judul</label>
          <input name="title" class="form-control" value="{{ old('title') }}" required>
          @error('title') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label class="form-label">Ringkasan (opsional)</label>
          <textarea name="summary" class="form-control" rows="3">{{ old('summary') }}</textarea>
          @error('summary') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label class="form-label">Isi Berita</label>
          <textarea name="content" class="form-control" rows="8" required>{{ old('content') }}</textarea>
          @error('content') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label class="form-label">Gambar Cover (opsional)</label>
          <input type="file" name="cover" class="form-control" accept="image/*">
          <div class="form-text">JPG/PNG/WebP, maks 4MB.</div>
          @error('cover') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="row">
          <div class="col-md-4 mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
              <option value="published" {{ old('status')==='published'?'selected':'' }}>Published</option>
              <option value="draft"     {{ old('status')==='draft'?'selected':'' }}>Draft</option>
            </select>
            @error('status') <div class="text-danger small">{{ $message }}</div> @enderror
          </div>
          <div class="col-md-8 mb-3">
            <label class="form-label">Publish At (opsional)</label>
            <input type="datetime-local" name="published_at" class="form-control" value="{{ old('published_at') }}">
            @error('published_at') <div class="text-danger small">{{ $message }}</div> @enderror
          </div>
        </div>

        <button class="btn btn-primary">Simpan Berita</button>
      </form>

      @php
        $latestNews = \App\Models\News::orderByDesc('created_at')->limit(6)->get();
      @endphp

      <h5 class="mb-3">Berita Terbaru</h5>
      @if($latestNews->isEmpty())
        <div class="alert alert-info">Belum ada berita.</div>
      @else
        <div class="table-responsive">
          <table class="table table-sm align-middle">
            <thead><tr><th>Judul</th><th>Status</th><th>Published</th></tr></thead>
            <tbody>
              @foreach($latestNews as $n)
                <tr>
                  <td>{{ $n->title }}</td>
                  <td><span class="badge bg-{{ $n->status==='published'?'success':'secondary' }}">{{ $n->status }}</span></td>
                  <td>{{ $n->published_at? $n->published_at->format('d M Y H:i') : '-' }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @endif
    </div>
  </div>
