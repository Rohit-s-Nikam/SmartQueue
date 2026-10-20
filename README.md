# SmartQueue: premium UI build

Frontend-only sample (PHP shell + browser `localStorage`, no database). Run it under XAMPP/Apache at
`http://localhost/smartqueue/` (any folder name works). Needs an internet connection for Bootstrap, Bootstrap Icons,
Google Fonts, Chart.js, qrcodejs (and the OpenStreetMap embed on hospital pages).

## What changed in this build

**Public site**: animated home with live "now serving" board, top-rated doctors and patient reviews; new
`hospitals.php` (search by hospital / doctor / department / city / address / facility, department chips, city, rating,
facility filters, sort by distance / rating / reviews / name, grid + list view, saved hospitals); new
`hospital.php?id=` details page (overview, facilities with icons, doctors with degrees + experience + languages + fee +
reviews, patient reviews, map, report-an-issue); **one login page for all 5 roles** (`login.php`), old admin login URLs redirect
there; `hospital-register.php` (4-step hospital registration with document upload).

**Patient**: `booking.php` 7-step flow with a connected progress line (circle-to-circle fill), hospital search / sort /
department filter / distance slider, "View hospital details" page, doctor search + reviews, date + slot, **book for
family members**, review, payment. `patient-dashboard.php` has a large live token board (now serving, your token,
people ahead, ETA, doctor-break warning), cancel (with refund note) and reschedule. `token.php` is a long page with a
boarding-pass style ticket, redesigned QR (rounded modules, designed eyes, logo plate, scan animation), live queue,
progress timeline, checklist, download / print / share. Also: `patient-history.php` (filters, rate doctor, book again,
report issue), `payments.php`, `receipt.php` (structured receipt with GST split, print / PDF), `patient-profile.php`
(personal, medical, family CRUD, preferences, password), `notifications.php`.

**Receptionist**: dashboard without graphs: KPI boxes plus one box per department showing current token, next patient,
after-next tokens, waiting / done / not-here. **When a doctor takes a break the department box and a banner turn red with a
live countdown; it clears on resume.** Late arrivals use "Arrived late (+5)" and are placed after 5 waiting patients.
New live queue lanes, patient search, token management (priority, cancel, CSV), no-show / recall, reports, profile.

**Doctor**: session control (start, break 5-30 min or custom, pause, resume, end), current + next patient profile
(allergies, conditions, vitals basics, previous consultations), consultation page with **multiple medicines, quick-add
and a remove (x) button per row**, prescription preview / print, my patients, today's queue, patient history,
prescriptions, queue updates, reports, profile.

**Hospital admin**: dashboard, hospital profile with **facility picker that feeds the public hospital page**, doctors
management (degree, experience, fee, room, availability), ratings + complaints inbox (respond, resolve, escalate).

**Platform admin**: dashboard, hospital registrations with per-document verification and approve / reject,
hospital management (suspend / reactivate), complaints (hospital and doctor), ratings and quality flags.

## Files added
`assets/css/premium.css`, `assets/css/tw.css` (compiled Tailwind utilities), `assets/js/sq-data.js` (sample hospital /
doctor / review data), `premium-core.js` (state, queue + break logic, QR, modal toolkit), `pages-public.js`,
`pages-patient.js`, `pages-staff.js`, `pages-admin.js`. Page files are thin PHP shells that mount a JS page module.

## Tailwind
Tailwind is used for layout utilities only, with preflight disabled so Bootstrap keeps working. After adding new utility
classes run `./build.sh` (needs Node). `tw.css` is already built.

## Sample behaviour worth knowing
- Everything is stored in the browser; "Reset saved data on this device" in the footer restores the sample data.
- Open reception and doctor pages in two tabs: break, late-arrival and call-next changes appear on the other tab.
- The doctor portal acts as Dr. Amit Patil, reception as City Care Hospital, patient as Priya Sharma.
- Document upload only stores file names (nothing is uploaded anywhere).
