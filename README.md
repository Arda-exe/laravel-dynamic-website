# Elden Ring Forum

Een dynamische Laravel website gewijd aan Elden Ring, met nieuws, discussies, FAQ en gebruikersprofielen.

## Beschrijving

Dit project is een data-driven webapplicatie ontwikkeld met Laravel voor het vak Backend Web Development aan de Erasmushogeschool Brussel. De website is een platform voor Elden Ring spelers waar ze nieuws kunnen lezen, discussies kunnen voeren, vragen kunnen stellen en hun profiel kunnen personaliseren.

## Installatiehandleiding

### Vereisten

- PHP >= 8.2
- Composer
- Node.js en NPM
- MySQL of een andere ondersteunde database
- Git

### Stap voor stap installatie

1. **Clone de repository**
   ```bash
   git clone https://github.com/Arda-exe/laravel-dynamic-website.git
   cd laravel-dynamic-website
   ```

2. **Installeer PHP dependencies**
   ```bash
   composer install
   ```

3. **Installeer Node.js dependencies**
   ```bash
   npm install
   ```

4. **Maak een .env bestand aan**
   ```bash
   cp .env.example .env
   ```

5. **Configureer de database in het .env bestand**
   
   Open het `.env` bestand en pas de volgende waarden aan:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=jouw_database_naam
   DB_USERNAME=jouw_database_gebruiker
   DB_PASSWORD=jouw_database_wachtwoord
   ```

6. **Genereer een application key**
   ```bash
   php artisan key:generate
   ```

7. **Voer database migrations en seeders uit**
   ```bash
   php artisan migrate:fresh --seed
   ```
   
8. **Maak een symbolic link voor storage**
   ```bash
   php artisan storage:link
   ```

9. **Build de frontend assets**
   ```bash
   npm run build
   ```

10. **Start de development server**
    ```bash
    php artisan serve
    ```
    
    De website is nu beschikbaar op `http://localhost:8000`

### Standaard Admin Inloggegevens

- **Email:** admin@ehb.be
- **Wachtwoord:** Password!321

## Functionaliteiten

#### 1. Login Systeem
- Bezoekers kunnen een nieuw account aanmaken via registratie
- Gebruikers kunnen inloggen en uitloggen
- "Remember me" functionaliteit
- Wachtwoord reset functionaliteit bij vergeten wachtwoord
- Admins kunnen gebruikers promoveren tot admin of admin rechten afnemen
- Admins kunnen handmatig nieuwe gebruikers aanmaken

#### 2. Profielpagina
- Elke gebruiker heeft een publieke profielpagina
- Gebruikers kunnen hun eigen profielgegevens bewerken
- Profiel bevat:
  - Username
  - Verjaardag
  - Profielfoto (opgeslagen op de webserver)
  - "Description" tekst

#### 3. Laatste Nieuwtjes
- Admins kunnen nieuwsartikelen toevoegen, bewerken en verwijderen
- Alle bezoekers kunnen nieuws bekijken
- Lijst van alle nieuwsartikelen met detailpagina per artikel
- Nieuwsartikelen bevatten:
  - Titel
  - Afbeelding (opgeslagen op de server)
  - Content
  - Publicatiedatum

#### 4. FAQ Pagina
- FAQ's georganiseerd per categorie
- Admins kunnen categorieën en FAQ's toevoegen, wijzigen en verwijderen
- Alle bezoekers kunnen de FAQ raadplegen

#### 5. Contact Pagina
- Contactformulier voor alle bezoekers
- Submissions worden opgeslagen in de database

#### 6. Commentaar Systeem
- Gebruikers kunnen commentaar achterlaten op nieuwsartikelen
- Gebruikers kunnen hun eigen comments bewerken en verwijderen
- Admins kunnen alle comments modereren

#### 7. Forum Systeem
- Forum met meerdere categorieën
- Gebruikers kunnen threads aanmaken
- Gebruikers kunnen reageren op threads
- Gebruikers kunnen enkel hun eigen threads/replies verwijderen
- Admins hebben volledige moderatie rechten en kunnen threads pinnen
- Overzicht van recent actieve discussies

#### 8. Admin Panel
- Centraal admin dashboard voor contentbeheer
- Overzicht van contact submissions
- Gebruikersbeheer (admin rechten toekennen/intrekken)
- Content moderatie (nieuws, forum, comments)

### Technische Implementatie

#### Views
- Meerdere layouts (guest layout, authenticated layout)
- Herbruikbare Blade components
- Control structures (@if, @foreach, @forelse)
- XSS protection (automatisch door Blade {{ }})
- CSRF protection (@csrf tokens)
- Client-side en server-side validatie

#### Routes
- Alle routes gebruiken controller methods
- Route middleware voor authenticatie en autorisatie
- Route grouping (web, auth, admin)
- Resource controllers voor CRUD operaties

#### Controllers
- Gescheiden controllers per functionaliteit
- Resource controllers voor standaard CRUD
- Request validation in controllers

#### Models & Database
- One-to-many relaties (User -> NewsArticles, User -> Comments, etc.)
- Many-to-many relatie (bijvoorbeeld via pivot tables indien nodig)
- Database migrations voor alle tabellen
- Seeders voor test/demo data
- Foreign key constraints

#### Authorization
- Gate checks in controllers en views
- Role-based access control (admin vs regular user)

## Bronnen

### Officiële Documentatie
- [Laravel 11 Documentation](https://laravel.com/docs/11.x) - Voor Eloquent relationships, authentication, authorization en file storage
- [Tailwind CSS Documentation](https://tailwindcss.com/docs) - Voor styling en responsive design

### AI Assistentie
- **GitHub Copilot** - Gebruikt voor het ontwerpen van de UI, plannen van code structuur en controleren van code kwaliteit
