const toggleIcon = (toggleId, iconId) => {
    const toggle = document.getElementById(toggleId);
    const icon = document.getElementById(iconId);
    toggle.addEventListener('click', () => {
      icon.classList.toggle('bi-chevron-down');
      icon.classList.toggle('bi-chevron-up');
    });
  };

  toggleIcon('entityToggle', 'entityIcon');
  toggleIcon('settingsToggle', 'settingsIcon');
  toggleIcon('trashedToggle', 'trashedIcon');