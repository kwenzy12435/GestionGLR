// Persistencia del tema (Bootstrap data-bs-theme)
(() => {
  const KEY = 'glr-theme';
  function apply(t){
    document.documentElement.setAttribute('data-bs-theme', t);
    localStorage.setItem(KEY, t);
    const btn = document.getElementById('themeSwitch');
    if(btn) btn.setAttribute('aria-pressed', t === 'dark' ? 'true' : 'false');
  }
  window.toggleThemeFancy = () => {
    const cur = document.documentElement.getAttribute('data-bs-theme') || 'dark';
    apply(cur === 'dark' ? 'light' : 'dark');
  };
  document.addEventListener('DOMContentLoaded', ()=>apply(localStorage.getItem(KEY)||'dark'));
})();

// Ojito de contraseña (ícono bonito)
window.togglePwd = function(id, btn){
  const el = document.getElementById(id);
  const wasPass = el.type === 'password';
  el.type = wasPass ? 'text' : 'password';
  const use = btn?.querySelector('use');
  if(use){
    const on  = btn.getAttribute('data-on')  || '#i-eye';
    const off = btn.getAttribute('data-off') || '#i-eye-off';
    use.setAttribute('href', el.type==='password' ? on : off);
  }
}
