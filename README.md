# webshop-backend-2.0
<strong>Testa sidan live:</strong> "Site under construction"

<strong>Lösningar på problemen:</strong>

```diff

-Arbetet ska implementeras med objektorienterade principer. (G)
+    Lösning:
vi har försökt att använda så mycket OOP vi kan. Genom att skapa och återavnända kod och nyttja klasser för våra produkter.

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
        Vi loopar ut och hämtar alla indormation ifrån databasen. Vi uppdaterar och pushar upp allt aktuellt live också.
        
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
        genom att pusha våra databashämtade produkter till en array i session så loopar vi ut dem i kundkorgen och därefter om en order genomförs uppdaterar vi saldot med en query direkt till databasen.

-Administratörer ska kunna uppdatera antalet produkter i lager från admin delen av sidan (G)
+    Lösning:

        genom att hämta produkter och info ifrån databasen och loopa ut dessa har vi nu lagt till en funktion som uppdaterar aktuellt saldo och skickar upp till databsen.

-Administratörer ska kunna se alla en lista på alla gjorda beställningar (G)
+    Lösning:

        vi loopar ut databsens ordrar direkt på sidan i en tabell. där vi även kan uppdatera.

-Administratörer ska kunna markera beställningar som skickade (VG)
+    Lösning:
        Vi har satt en checkbox i beställningar på adminsidan som sätter en GET variabel, sen kollar functions om den är satt och ändrar sql shipped till true.

-Sidans produkter ska delas upp i kategorier, en produkt ska tillhöra minst en kategori, men kan tillhöra flera (G)
+    Lösning:

-Från hemsidan ska man kunna se en lista över alla produkter, och man ska kunna lista bara dom produkter som tillhör en -kategori (G)



+    Lösning:
        Vi har knappar som skickar värde i GET, Om det inte finns ett värde så körs en query med alla produkter, annars en query baserad på det man skickar i GET.

-Besökare ska kunna lägga produkterna i en kundkorg, som är sparad i session på servern (G)
+    Lösning:
        Produkten kunden väljer pushas till en array med antal och id till session.

-Man ska från hemsidan kunna skriva upp sig för att få butikens nyhetsbrev genom att ange sitt namn och epostadress (G)+    Lösning:
        Detta har vi löst med en slidedown i JS som lägger sig över allt content på sidan.
        När man fyller i fälten och klickar "yes" så skickas det med ett form.
        Försvinner och sparas i session för att man inte ska få upp den igen.
        Vi har sedan en isset som kollar POST["name"] && POST["email"].
        Blir de satta så körs en funktion som skickar upp det till databasen med 
        INSERT.

-När man gör en beställning ska man också få chansen att skriva upp sig för nyhetsbrevet (VG)
+    Lösning:
        Detta har vi löst med en "checkbox" i kundkorgen som man kan kryssa i om man vill ha nyhetsbrev.
        En "isset" kollar då om post['cartNewsLetter] blir satt. 
        Blir den satt så unsettas session och cookie för att visa samma nyhetsbrev som vi har på startsidan.
-När besökare gör en beställning ska hen få ett lösenord till sidan där man kan logga in som kund (VG)
+    Lösning:
        Vi skapade två funktioner som använder rand funktionen för att generera ett random username och random password som sedan läggs i session, skickas genom kryptering till databasen och skrivs ut på tacksidan. Beställningen är sedan kopplad till det usernamet.

-När man är inloggad som kund ska man kunna se sina gjorda beställning och om det är skickade eller inte (VG)
+    Lösning:

        när man loggar in som registrerar kund och har en aktuellt order, hämtas den ifrån databsen och loopas ut i en tabell där admin kan påverka skicka ja eller nej, och kunden själv kan påverka mottagen ja eller nej, med en updatequery.

-Som inloggad kund ska man kunna markera sin beställning som mottagen (VG)
+    Lösning:
<<<<<<< HEAD
        När man loggar in som registrerar kund och har en aktuellt order, hämtas den ifrån databsen och loopas ut i en tabell där admin kan påverka skicka ja eller nej, och kunden själv kan påverka mottagen ja eller nej, med en updatequery.
=======
när man loggar in som registrerar kund och har en aktuellt order, hämtas den ifrån databsen och loopas ut i en tabell där admin kan påverka skicka ja eller nej, och kunden själv kan påverka mottagen ja eller nej, med en updatequery.

>>>>>>> 0cffd44877c909051c506dc2d853841ccfade878
-Administratörer ska kunna se en lista över personer som vill ha nyhetsbrevet och deras epost adresser (G)

+    Lösning:
        På admin sidan så kan man välja "subscribers" som meny alt. 
        En ajax körs och sidan skriver ut en table med info från DB.
-Besökare ska kunna välja ett av flera fraktalternativ (G)
+    Lösning:
        Vi har ett form i vilket man kan välja ett av fraktalternativen som sedan skickas med post och läggs i session.

-Tillgängliga fraktalternativ ska vara hämtade från databasen (G)
+    Lösning:
        Vi har skapat en funktion som hämtar frakten som sedan läggs i session när kunden väljer önskat fraktalternativ.

-Administratörer ska kunna redigera vilka kategorier en produkt tillhör (VG)
+    Lösning:

genom att först hämta alla produkter och loopa ut infon i en tabell. och sedan lägga in möjligheten att ändra kategori som vi läser in ifrån en selectform som vi skickar till en JS funktion som i sin tur behandlar och skickar tillbaka infon till sidan med hjälp av ajax i form utav POST som i sintur kollar om det är gjort i postanropet och därefter kör updatequeryn direkt till databasen och då liveuppdaterar sidan PGA AJAX <<<<<<<<<<<<<3

-Administratörer ska kunna skicka nyhetsbrev från sitt gränssnitt, nyhetsbrevet ska sparas i databasen samt innehålla en -titel och en brödtext (VG)
+    Lösning:
        Meny alt. med "newsletter" kommer man åt när man är inloggad som admin.
        Där finns det 2 input fält, titel och info som man kan fylla i.
        Både på titeln och info rutan ligger det en max som spärrar användaren att fylla i med allt för mycket text.
        Klickar man sedan på skicka så skickas det med Post och en INSERT startar med texten man fyllt in.
-Administratörer ska kunna lägga till och ta bort produkter (VG)
+    Lösning:

```
