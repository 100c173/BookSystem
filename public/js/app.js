// Prevent main category from being marked active
document.getElementById('categoryToggle').addEventListener('click', function (e) {
    this.classList.remove('active');
  });
  
  // Only activate sub items
  const subItems = document.querySelectorAll('.sub-item');
  subItems.forEach(item => {
    item.addEventListener('click', () => {
      subItems.forEach(i => i.classList.remove('active'));
      item.classList.add('active');
    });
  });
  