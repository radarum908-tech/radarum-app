document.getElementById('menu-dashboard').addEventListener('click', function (e) {
    e.preventDefault();
    document.getElementById('dashboardContent').style.display = 'block';
    document.getElementById('borangContent').style.display = 'none';
  });

  document.getElementById('menu-borang').addEventListener('click', function (e) {
    e.preventDefault();
    document.getElementById('dashboardContent').style.display = 'none';
    document.getElementById('borangContent').style.display = 'block';
  });

  const menuItems = document.querySelectorAll('.nav-link');

  menuItems.forEach(item => {
    item.addEventListener('click', function () {
      menuItems.forEach(link => link.classList.remove('active'));
      this.classList.add('active');
    });
  });
