# TODO - UPPM Web Fixes

## Phase 1: Navbar Updates
- [ ] 1. Update Publikasi dropdown menu in header.blade.php
  - Replace Hak Paten → Jurnal BPTKSPK (external link)
  - Replace Jurnal → Jurnal OJS (external link)
  - Replace Hak Cipta → Prosiding Semnas (external link)
  - Update mobile menu accordingly

## Phase 2: Profil Page Updates
- [ ] 2. Remove bottom "Tim UPPM - Struktur Organisasi" section
- [ ] 3. Improve Visi-Misi cards styling (make more professional)

## Phase 3: Card Layout Fixes
- [ ] 4. Fix home.blade.php - penelitian cards layout
- [ ] 5. Fix penelitian.blade.php - research cards responsive
- [ ] 6. Fix pengabdian.blade.php - skema cards mobile
- [ ] 7. Fix publikasi.blade.php - publication cards
- [ ] 8. Fix struktur-organisasi.blade.php - team cards

## Implementation Notes
- Use consistent grid: grid-cols-1 (mobile) → md:grid-cols-2 → lg:grid-cols-3
- Ensure proper padding on mobile: px-4 or px-6
- Fix any overflow issues
</parameter>

### 4. Pengabdian Page (resources/views/frontend/pengabdian.blade.php)
- Changed layout from 'layouts.frontend' to 'layouts.app' for consistency
- Page now uses the correct main application layout
