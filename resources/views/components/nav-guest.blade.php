<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>KNewbie — Dashboard</title>
  <link href="{{ asset('css/output.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <meta name="description" content="KNewbie dashboard">

  <!-- Quick overrides to avoid interference dari rule `article { ... }` di output.css -->
  <style>
    /* override penting — mencegah rule global article merusak card */
    .course-card, .course-card * { box-sizing: border-box; }
    .course-card { display: block !important; width: auto !important; max-width: 100% !important; }
    .course-thumb { width:100%; height:150px; object-fit:cover; display:block; border-top-left-radius:20px; border-top-right-radius:20px; }
    /* responsive grid jika output.css tidak memiliki sm:/lg: */
    .course-grid { display:grid; grid-template-columns: 1fr; gap:26px; }
    @media (min-width:640px){ .course-grid{ grid-template-columns: repeat(2, 1fr); } }
    @media (min-width:1024px){ .course-grid{ grid-template-columns: repeat(4, 1fr); } }
  </style>
</head>
<body style="font-family: 'Poppins', sans-serif; background:#f8faf9; color:#0f1724;">

  <!-- NOTE: Saya KOMENTARI <x-nav-guest/> karena kita menggunakan header inline di sini.
       Jika kamu ingin pakai x-nav-guest, hapus header inline di bawah dan kembalikan komponen. -->
  {{-- <x-nav-guest/> --}}

  <!-- Inline header (gunakan ini jika x-nav-guest dinonaktifkan) -->
  <header style="background:#fff;border-radius:8px;padding:18px 22px;display:flex;justify-content:space-between;align-items:center;border:1px solid rgba(2,6,23,0.04);margin:18px 0;">
    <div style="display:flex;align-items:center;gap:28px">
      <div style="font-weight:800;font-size:22px">KNewbie</div>
      <nav style="display:flex;gap:18px;align-items:center">
        <a href="#" style="font-weight:600;color:#111827">Overview</a>
        <a href="#" style="color:#6b7280">Courses</a>
      </nav>
    </div>
    <div style="display:flex;align-items:center;gap:12px">
      <button aria-label="Apps" style="width:44px;height:44px;border-radius:8px;border:1px solid rgba(2,6,23,0.04);background:#fff;"></button>
      <button aria-label="Notifications" style="width:44px;height:44px;border-radius:8px;border:1px solid rgba(2,6,23,0.04);background:#fff;position:relative;">
        <span style="position:absolute;right:8px;top:8px;width:8px;height:8px;background:#ef4444;border-radius:999px;border:2px solid #fff;display:inline-block"></span>
      </button>
      <div style="display:flex;align-items:center;gap:12px;padding-left:14px;border-left:1px solid rgba(2,6,23,0.04)">
        <img src="{{ asset('assets/images/avatars/amelia.jpg') }}" alt="Amelia" style="width:44px;height:44px;border-radius:999px;object-fit:cover">
        <div style="display:none" class="profile-meta-desktop"><div style="font-weight:700">Amelia</div><div style="font-size:13px;color:#6b7280">Student</div></div>
      </div>
    </div>
  </header>

  <!-- HERO -->
  <main style="max-width:1280px;margin:0 auto;padding:0 30px 48px;">
    <section style="border-radius:28px;overflow:hidden;background-image: linear-gradient(rgba(0,0,0,0.45),rgba(0,0,0,0.45)), url('{{ asset('assets/images/backgrounds/learning-finished.png') }}'); background-size:cover; background-position:center; min-height:260px; display:flex; align-items:center; justify-content:center; margin-bottom:34px;">
      <div style="text-align:center;color:#fff;padding:48px 28px;max-width:980px;width:100%">
        <h2 style="font-size:28px;line-height:1.1;font-weight:800;margin-bottom:8px;text-shadow:0 6px 18px rgba(0,0,0,0.35)">👋 Selamat datang, Amelia!</h2>
        <p style="margin-bottom:18px;text-shadow:0 6px 18px rgba(0,0,0,0.28)">Semoga harimu penuh semangat belajar dan inspirasi. ✨</p>

        <form class="search-pill" style="max-width:720px;margin:0 auto;display:flex;align-items:center;gap:12px;background:#fff;border-radius:999px;padding:8px 16px;box-shadow:0 10px 30px rgba(2,6,23,0.12);" role="search" onsubmit="event.preventDefault()">
          <input type="search" placeholder="Yuk, jelajahi materi seru yang kamu suka!" aria-label="Cari materi" style="border:0;outline:0;background:transparent;font-size:15px;flex:1;color:#111827">
          <button type="submit" aria-label="Cari" style="background:transparent;border:0;padding:6px;border-radius:999px;cursor:pointer">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"><circle cx="10.5" cy="10.5" r="6.5" stroke="#6b7280" stroke-width="1.6"/><path d="M21 21l-4.35-4.35" stroke="#6b7280" stroke-width="1.6" stroke-linecap="round"/></svg>
          </button>
        </form>
      </div>
    </section>

    <!-- Course Catalog -->
    <section>
      <h3 style="font-size:28px;font-weight:800;margin-bottom:16px">Course Catalog</h3>

      <div class="course-grid">
        <!-- NOTE: menggunakan <div> bukan <article> untuk menghindari rule global -->
        <div class="course-card" role="article" style="background:#fff;border-radius:20px;overflow:hidden;box-shadow:0 6px 18px rgba(18,32,50,0.06);transition:transform .25s;">
          <img class="course-thumb" src="{{ asset('assets/images/thumbnails/thumbnail-1.png') }}" alt="thumbnail 1">
          <div style="padding:14px">
            <div style="font-weight:700;font-size:14px;line-height:1.25;color:#0b1220;margin-bottom:10px;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;">Full-Stack Sr. Website JavaScript Developer 2025</div>
            <div style="padding-top:6px;border-top:1px dashed rgba(15,23,36,0.03);margin-top:6px">
              <div style="display:flex;flex-direction:column;gap:10px;color:#6b7280;font-size:13px">
                <div style="display:flex;align-items:flex-start;gap:10px"><svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292" stroke="#1f9d8a" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>Algoritma</div>
                <div style="display:flex;align-items:flex-start;gap:10px"><svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75" stroke="#1f9d8a" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>1694 Lessons</div>
                <div style="display:flex;align-items:flex-start;gap:10px"><svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M20.25 14.15v4.05c0 .621-.504 1.125-1.125 1.125H5.125" stroke="#1f9d8a" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>Ready to Work</div>
              </div>
            </div>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="course-card" role="article" style="background:#fff;border-radius:20px;overflow:hidden;box-shadow:0 6px 18px rgba(18,32,50,0.06);">
          <img class="course-thumb" src="{{ asset('assets/images/thumbnails/thumbnail-2.png') }}" alt="thumbnail 2">
          <div style="padding:14px">
            <div style="font-weight:700;font-size:14px;line-height:1.25;margin-bottom:10px">Full-Stack Sr. Website JavaScript Developer 2025</div>
            <div style="padding-top:6px;border-top:1px dashed rgba(15,23,36,0.03);margin-top:6px">
              <div style="display:flex;flex-direction:column;gap:10px;color:#6b7280;font-size:13px">
                <div style="display:flex;align-items:flex-start;gap:10px"><svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292" stroke="#1f9d8a" stroke-width="1.6"/></svg>Algoritma</div>
                <div style="display:flex;align-items:flex-start;gap:10px"><svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75" stroke="#1f9d8a" stroke-width="1.6"/></svg>1694 Lessons</div>
                <div style="display:flex;align-items:flex-start;gap:10px"><svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M20.25 14.15v4.05c0 .621-.504 1.125-1.125 1.125H5.125" stroke="#1f9d8a" stroke-width="1.6"/></svg>Ready to Work</div>
              </div>
            </div>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="course-card" role="article" style="background:#fff;border-radius:20px;overflow:hidden;box-shadow:0 6px 18px rgba(18,32,50,0.06);">
          <img class="course-thumb" src="{{ asset('assets/images/thumbnails/thumbnail-3.png') }}" alt="thumbnail 3">
          <div style="padding:14px">
            <div style="font-weight:700;font-size:14px;line-height:1.25;margin-bottom:10px">Full-Stack Sr. Website JavaScript Developer 2025</div>
            <div style="padding-top:6px;border-top:1px dashed rgba(15,23,36,0.03);margin-top:6px">
              <div style="display:flex;flex-direction:column;gap:10px;color:#6b7280;font-size:13px">
                <div style="display:flex;align-items:flex-start;gap:10px"><svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292" stroke="#1f9d8a" stroke-width="1.6"/></svg>Algoritma</div>
                <div style="display:flex;align-items:flex-start;gap:10px"><svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75" stroke="#1f9d8a" stroke-width="1.6"/></svg>1694 Lessons</div>
                <div style="display:flex;align-items:flex-start;gap:10px"><svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M20.25 14.15v4.05c0 .621-.504 1.125-1.125 1.125H5.125" stroke="#1f9d8a" stroke-width="1.6"/></svg>Ready to Work</div>
              </div>
            </div>
          </div>
        </div>

        <!-- Card 4 -->
        <div class="course-card" role="article" style="background:#fff;border-radius:20px;overflow:hidden;box-shadow:0 6px 18px rgba(18,32,50,0.06);">
          <img class="course-thumb" src="{{ asset('assets/images/thumbnails/thumbnail-4.png') }}" alt="thumbnail 4">
          <div style="padding:14px">
            <div style="font-weight:700;font-size:14px;line-height:1.25;margin-bottom:10px">Full-Stack Sr. Website JavaScript Developer 2025</div>
            <div style="padding-top:6px;border-top:1px dashed rgba(15,23,36,0.03);margin-top:6px">
              <div style="display:flex;flex-direction:column;gap:10px;color:#6b7280;font-size:13px">
                <div style="display:flex;align-items:flex-start;gap:10px"><svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292" stroke="#1f9d8a" stroke-width="1.6"/></svg>Algoritma</div>
                <div style="display:flex;align-items:flex-start;gap:10px"><svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75" stroke="#1f9d8a" stroke-width="1.6"/></svg>1694 Lessons</div>
                <div style="display:flex;align-items:flex-start;gap:10px"><svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M20.25 14.15v4.05c0 .621-.504 1.125-1.125 1.125H5.125" stroke="#1f9d8a" stroke-width="1.6"/></svg>Ready to Work</div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

  </main>

  <script>
    // header shadow on scroll
    (function(){
      const header = document.querySelector('header');
      if(!header) return;
      window.addEventListener('scroll', () => {
        header.style.boxShadow = window.scrollY > 8 ? '0 8px 30px rgba(2,6,23,0.08)' : 'none';
      });
    })();
  </script>
</body>
</html>
