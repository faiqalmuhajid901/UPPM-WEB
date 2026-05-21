# TODO Steps for Navbar Jurnal Links Update

## Completed Steps
- [x] Step 1: Analyzed project files, identified navbar in `resources/views/partials/header.blade.php`
- [x] Step 2: Confirmed routes in `routes/web.php` and lang keys in `resources/lang/*/navbar.php`
- [x] Step 3: Created detailed edit plan and got user approval

## Completed Steps
- [x] Step 1: Analyzed project files, identified navbar in `resources/views/partials/header.blade.php`
- [x] Step 2: Confirmed routes in `routes/web.php` and lang keys in `resources/lang/*/navbar.php`
- [x] Step 3: Created detailed edit plan and got user approval
- [x] Step 4: Edit `resources/views/partials/header.blade.php` - Replace 4x `{{ route('publikasi.jurnal-bptkspk') }}` with external URL + target="_blank"
- [x] Step 5: Edit `resources/views/partials/header.blade.php` - Replace 4x `{{ route('publikasi.jurnal-ojs') }}` with external URL + target="_blank"
- [x] Step 6: Run `php artisan view:clear`
- [x] Step 7: Test navbar links in browser (desktop/mobile, both languages)

**All steps completed! Navbar menu "Jurnal BPTKSPK" and "Jurnal OJS" now link to the external URLs.**
