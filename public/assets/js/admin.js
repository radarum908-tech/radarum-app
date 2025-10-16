
    const menuItems = document.querySelectorAll('.nav-link');

    // Mapping ID konten
    const contents = {
    dashboard: document.getElementById('dashboardContent'),
    borang: document.getElementById('borangContent'),
    akun: document.getElementById('akunContent'),
    ranking: document.getElementById('rankingContent'),
    berita: document.getElementById('TambahBerita')
    };

    function showContent(target) {
    Object.keys(contents).forEach((key) => {
        const el = contents[key];
        if (key === target) {
        el.style.display = 'block';

        // Reset & trigger animasi ulang
        el.classList.remove('fade-in');
        void el.offsetWidth; // memicu reflow
        el.classList.add('fade-in');
        } else {
        el.style.display = 'none';
        el.classList.remove('fade-in');
        }
    });
    }

    // Event binding
    document.getElementById('menu-dashboard').addEventListener('click', (e) => {
    e.preventDefault();
    showContent('dashboard');
    });

    document.getElementById('menu-borang').addEventListener('click', (e) => {
    e.preventDefault();
    showContent('borang');
    });

    document.getElementById('menu-akun').addEventListener('click', (e) => {
    e.preventDefault();
    showContent('akun');
    });

    document.getElementById('menu-ranking').addEventListener('click',(e)=>{
        e.preventDefault();
        showContent('ranking');
    })
    document.getElementById('menu-berita').addEventListener('click',(e)=>{
        e.preventDefault();
        showContent('berita');
    })

    // Highlight menu aktif
    menuItems.forEach(item => {
        item.addEventListener('click', function () {
        menuItems.forEach(link => link.classList.remove('active'));
        this.classList.add('active');
        });
    });

  function showEditModal(id, nama, email, role, nomor_telepon, koordinator_program) {
    document.getElementById('edit-id').value = id;
    document.getElementById('edit-nama').value = nama;
    document.getElementById('edit-email').value = email;
    document.getElementById('edit-role').value = role;
    document.getElementById('edit-nomor_telepon').value = nomor_telepon;
    document.getElementById('edit-koordinator_program').value = koordinator_program;

    document.getElementById('editForm').action = `/admin/update-akun/${id}`;
    const editModal = new bootstrap.Modal(document.getElementById('editModal'));
    editModal.show();
}

window.addEventListener('load', function () {
    const preloader = document.getElementById('preloader');

    // Kasih delay misalnya 1.5 detik biar terlihat loading-nya
    setTimeout(() => {
      preloader.classList.add('fade-out');

      // Setelah animasi fade-out selesai, hapus dari DOM
      setTimeout(() => preloader.remove(), 500);
    }, 500); // <- delay awal 1.5 detik
  });
