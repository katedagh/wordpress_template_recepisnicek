document.addEventListener('DOMContentLoaded', () => {
  const banner = document.getElementById('cookie-banner');
  const button = document.getElementById('cookie-understand');

  // pokud už byla informace zobrazena, lištu neukazujeme
  if (!localStorage.getItem('cookieInfoSeen')) {
    banner.hidden = false;
  }

  button.addEventListener('click', () => {
    localStorage.setItem('cookieInfoSeen', 'true');
    banner.hidden = true;
  });
});