document.getElementById('menu-dashboard').addEventListener('click', function (e) {
    e.preventDefault();
        document.getElementById('dashboardContent').style.display = 'block';
        document.getElementById('borangContent').style.display = 'none';
        document.getElementById('riwayatContent').style.display = 'none';
        document.getElementById('profilContent').style.display = 'none';
    });

    document.getElementById('menu-borang').addEventListener('click', function (e) {
        e.preventDefault();
        document.getElementById('dashboardContent').style.display = 'none';
        document.getElementById('borangContent').style.display = 'block';
        document.getElementById('riwayatContent').style.display = 'none';
        document.getElementById('profilContent').style.display = 'none';
    });

    document.getElementById('menu-riwayat').addEventListener('click', function (e) {
        e.preventDefault();
        document.getElementById('dashboardContent').style.display = 'none';
        document.getElementById('borangContent').style.display = 'none';
        document.getElementById('riwayatContent').style.display = 'block';
        document.getElementById('profilContent').style.display = 'none';
    });
    document.getElementById('menu-profil').addEventListener('click', function (e) {
        e.preventDefault();
        document.getElementById('dashboardContent').style.display = 'none';
        document.getElementById('borangContent').style.display = 'none';
        document.getElementById('riwayatContent').style.display = 'none';
        document.getElementById('profilContent').style.display = 'block';
    });


    const menuItems = document.querySelectorAll('.nav-link');

    menuItems.forEach(item => {
        item.addEventListener('click', function () {
        menuItems.forEach(link => link.classList.remove('active'));
        this.classList.add('active');
    });
});

document.addEventListener('DOMContentLoaded', async () => {

    let allData = {
        pilars: [],
        kriterias: [],
        subKriterias: [],
        indikators: [],
    };

    // 🔹 Load semua data sekali saja
    try {
        let res = await fetch('/api/preload');
        allData = await res.json();
    } catch (err) {
        console.error("Gagal preload data", err);
    }



    function populateOptions(data, targetSelect, placeholder = '-- Pilih --', type = '', excludeIds = []) {
        targetSelect.innerHTML = `<option value="" disabled selected>${placeholder}</option>`;
        data.forEach(item => {
            let text = item.nama || item.pilar || item.kriteria || item.sub_kriteria || item.indikator_penilaian;
            if (excludeIds.includes(item.id.toString())) return;

            let opt = document.createElement('option');
            opt.value = item.id;
            opt.textContent = text;
            opt.disabled = false;
            targetSelect.appendChild(opt);
        });

        targetSelect.disabled = false;
    }

    function setupSubindikatorEvents(subindikator) {
        const pilarSelect = subindikator.querySelector('.pilar');
        const kriteriaSelect = subindikator.querySelector('.kriteria');
        const subKriteriaSelect = subindikator.querySelector('.subkriteria');
        const indikatorSelect = subindikator.querySelector('.indikatorpenilaian');

        // Isi pilar
        populateOptions(allData.pilars, pilarSelect, '-- Pilih Pilar --');

        pilarSelect.addEventListener('change', () => {
            let kriterias = allData.kriterias.filter(k => k.pilar_id == pilarSelect.value);
            populateOptions(kriterias, kriteriaSelect, '-- Pilih Kriteria --');
            kriteriaSelect.disabled = false;
            subKriteriaSelect.disabled = true;
            indikatorSelect.disabled = true;
            syncParentOptions();
        });

        kriteriaSelect.addEventListener('change', () => {
            let subs = allData.subKriterias.filter(s => s.kriteria_id == kriteriaSelect.value);
            populateOptions(subs, subKriteriaSelect, '-- Pilih Sub Kriteria --', 'subkriteria');
            subKriteriaSelect.disabled = false;
            indikatorSelect.disabled = true;
            syncParentOptions();
        });

        subKriteriaSelect.addEventListener('change', () => {
            let inds = allData.indikators.filter(i => i.sub_kriteria_id == subKriteriaSelect.value);
            populateOptions(inds, indikatorSelect, '-- Pilih Indikator Penilaian --', 'indikator');
            indikatorSelect.disabled = false;

            syncParentOptions();
        });

        indikatorSelect.addEventListener('change', () => {
            subindikator.querySelector('.evidenceWrapper').style.display = 'block';
            subindikator.querySelector('.catatanWrapper').style.display = 'block';
            syncParentOptions();
        });
    }

    function disableSubkriteriaIfChildrenUsed(selectedIndikators, selectedSubkriteria) {
        for (let subId of selectedSubkriteria) {
            if (!subId) continue;
            let indicators = allData.indikators.filter(ind => ind.sub_kriteria_id == subId);
            let anyUsed = indicators.some(ind => selectedIndikators.includes(ind.id.toString()));
            document.querySelectorAll(`.subkriteria option[value="${subId}"]`).forEach(opt => {
                if (!opt.selected) opt.disabled = anyUsed;
            });
        }
    }

    function disableKriteriaIfChildrenUsed(selectedSubkriteria, selectedKriteria) {
        for (let krId of selectedKriteria) {
            if (!krId) continue;
            let subs = allData.subKriterias.filter(sub => sub.kriteria_id == krId);
            let allUsed = subs.every(sub => selectedSubkriteria.includes(sub.id.toString()));
            document.querySelectorAll(`.kriteria option[value="${krId}"]`).forEach(opt => {
                if (!opt.selected) opt.disabled = allUsed;
            });
        }
    }

    function disablePilarIfChildrenUsed(selectedKriteria, selectedPilar) {
        for (let pilarId of selectedPilar) {
            if (!pilarId) continue;
            let kriterias = allData.kriterias.filter(kr => kr.pilar_id == pilarId);
            let allUsed = kriterias.every(kr => selectedKriteria.includes(kr.id.toString()));
            document.querySelectorAll(`.pilar option[value="${pilarId}"]`).forEach(opt => {
                if (!opt.selected) opt.disabled = allUsed;
            });
        }
    }

    async function syncParentOptions() {
        const selectedIndikators = Array.from(document.querySelectorAll('.indikatorpenilaian'))
            .map(s => s.value).filter(v => v !== "");

        const selectedSubkriteria = Array.from(document.querySelectorAll('.subkriteria'))
            .map(s => s.value).filter(v => v !== "");

        const selectedKriteria = Array.from(document.querySelectorAll('.kriteria'))
            .map(s => s.value).filter(v => v !== "");

        const selectedPilar = Array.from(document.querySelectorAll('.pilar'))
            .map(s => s.value).filter(v => v !== "");

        // 🔹 Reset dulu semua biar gak ketiban disable permanen
        document.querySelectorAll('.subkriteria option, .kriteria option, .pilar option').forEach(opt => {
            if (opt.value !== "") opt.disabled = false;
        });

        // 🔹 Jalankan fungsi modular
        disableSubkriteriaIfChildrenUsed(selectedIndikators, selectedSubkriteria);
        disableKriteriaIfChildrenUsed(selectedSubkriteria, selectedKriteria);
        disablePilarIfChildrenUsed(selectedKriteria, selectedPilar);
    }


    // Inisialisasi untuk form pertama
    document.querySelectorAll('.subindikator-item').forEach(setupSubindikatorEvents);

    // Tambah Subindikator Baru
    document.getElementById('addSubindikator').addEventListener('click', () => {
        const wrapper = document.getElementById('subindikatorWrapper');
        const template = document.getElementById('subindikatorTemplate').content.cloneNode(true);
        const newSubindikator = template.querySelector('.subindikator-item');
        wrapper.appendChild(newSubindikator);
        setupSubindikatorEvents(newSubindikator);
    });

    // Hapus Subindikator
    document.addEventListener('click', e => {
        if (e.target.classList.contains('remove-subindikator')) {
            e.target.closest('.subindikator-item').remove();
            syncParentOptions(); // sync ulang setelah hapus
        }
    });

});
