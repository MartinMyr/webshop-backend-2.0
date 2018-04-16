# webshop-backend-2.0
<strong>Testa sidan live:</strong> "Site under construction"

<strong>Lösningar på problemen:</strong>

```diff

-Arbetet ska implementeras med objektorienterade principer. (G)
+    Lösning:

-Skapa ett konceptuellt ER diagram, detta ska lämnas in vid idégodkännandet (G)
+    Lösning:
        https://drive.google.com/file/d/1WvHlt9pxFj-lLXUGShCv6sjtKrGWQ9rc/view?usp=sharing

-Beskriv er företagsidé i en kort textuell presentation, detta ska lämnas in vid idégodkännandet (G)
+    Lösning:
        År 1992 var Super Nintendo Entertainment System (SNES) årets julklapp 
        och den hetaste produkten på marknaden.
        Vi har därför bestämt oss för att göra en webbshop i retrostil där det ska säljas SNES,
        spel till SNES och andra tillbehör till konsolen. 

-All data som programmet utnyttjar ska vara sparat i en MYSQL databas (produkter, beställningar, konton mm) (G)
+    Lösning:

-Det ska finnas ett normaliserat diagram över databasen i gitrepot (G)
+    Lösning:

-Man ska kunna logga in som administratör i systemet (G)
+    Lösning:
        Vi har samma inloggning för vanliga users som för admins.
        Vid inloggning så kollar den först om admin från DB är 1.
        Sedan kollar den om det blev en matchning från DB och sist så går den in i else och ett felmeddelande skrivs ut.
-Man ska kunna registrera sig som administratör på sidan, nya användare ska sparas i databasen (VG)
+    Lösning:
        Vi har valt att man inte ska kunna välja vid registrering av användare att kryssa i sig som admin. Detta bestäms sedan utav de som har admin åtkomst där de kan kryssa i och göra en vanlig användare till admin.
        
        Alla nya användare som skapas blir kollade på "username" mot databasen för att kolla om det redan existerar. Finns det redan får man ett felmeddelande, annars skickas den upp all info till databsen och man får sedan logga in.

-En administratör behöver godkännas av en tidigare administratör innan man kan logga in (VG)
+    Lösning:
        När man är inloggad som admin så har vi en tabell som visar vilka som är admin och inte just nu.
        Brevid tabellen har vi en "input checkbox" tillhörande en submit knapp längre ner.
        Där slänger den in values från checkboxarna i en query och jämför dessa med de i databasen. Sedan får de match och uppdaterar admin med value "1" där de får träff från queryn.              

-Inga Lösenord får sparas i klartext i databasen (G)
+    Lösning:
        När vi skapar användare körs funktionen md5() som krypterar lösenordet. Denna funktionen används sedan också för att kunna matcha rätt inputs vid login med databasen.

-En besökare ska kunna beställa produkter från sidan, detta ska uppdatera lagersaldot i databasen (G)
+    Lösning:

-Administratörer ska kunna uppdatera antalet produkter i lager från admin delen av sidan (G)
+    Lösning:

-Administratörer ska kunna se alla en lista på alla gjorda beställningar (G)
+    Lösning:

-Administratörer ska kunna markera beställningar som skickade (VG)
+    Lösning:

-Sidans produkter ska delas upp i kategorier, en produkt ska tillhöra minst en kategori, men kan tillhöra flera (G)
+    Lösning:

-Från hemsidan ska man kunna se en lista över alla produkter, och man ska kunna lista bara dom produkter som tillhör en -kategori (G)
+    Lösning:

-Besökare ska kunna lägga produkterna i en kundkorg, som är sparad i session på servern (G)
+    Lösning:

-Man ska från hemsidan kunna skriva upp sig för att få butikens nyhetsbrev genom att ange sitt namn och epostadress (G)
+    Lösning:
        Detta har vi löst med en slidedown i JS som lägger sig över allt content på sidan.
        När man fyller i fälten och klickar "yes" så skickas det med ett form.
        Försvinner och sparas i session för att man inte ska få upp den igen.
        Vi har sedan en isset som kollar POST["name"] && POST["email"].
        Blir de satta så körs en funktion som skickar upp det till databasen med 
        INSERT.

-När man gör en beställning ska man också få chansen att skriva upp sig för nyhetsbrevet (VG)
+    Lösning:

-När besökare gör en beställning ska hen få ett lösenord till sidan där man kan logga in som kund (VG)
+    Lösning:

-När man är inloggad som kund ska man kunna se sina gjorda beställning och om det är skickade eller inte (VG)
+    Lösning:

-Som inloggad kund ska man kunna markera sin beställning som mottagen (VG)
+    Lösning:

-Administratörer ska kunna se en lista över personer som vill ha nyhetsbrevet och deras epost adresser (G)
+    Lösning:
        På admin sidan så kan man välja "subscribers" som meny alt. 
        En ajax körs och sidan skriver ut en table med info från DB.
-Besökare ska kunna välja ett av flera fraktalternativ (G)
+    Lösning:

-Tillgängliga fraktalternativ ska vara hämtade från databasen (G)
+    Lösning:

-Administratörer ska kunna redigera vilka kategorier en produkt tillhör (VG)
+    Lösning:

-Administratörer ska kunna skicka nyhetsbrev från sitt gränssnitt, nyhetsbrevet ska sparas i databasen samt innehålla en -titel och en brödtext (VG)
+    Lösning:
        Meny alt. med "newsletter" kommer man åt när man är inloggad som admin.
        Där finns det 2 input fält, titel och info som man kan fylla i.
        Både på titeln och info rutan ligger det en max som spärrar användaren att fylla i med allt för mycket text.
        Klickar man sedan på skicka så skickas det med Post och en INSERT startar med texten man fyllt in.
-Administratörer ska kunna lägga till och ta bort produkter (VG)
+    Lösning:

```