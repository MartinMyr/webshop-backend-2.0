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

-Man ska kunna registrera sig som administratör på sidan, nya användare ska sparas i databasen (VG)
+    Lösning:

-En administratör behöver godkännas av en tidigare administratör innan man kan logga in (VG)
+    Lösning:

-Inga Lösenord får sparas i klartext i databasen (G)
+    Lösning:

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
        Detta har vi löst med en slidedown i JS som lägger sig överallt content på sidan.
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

-Besökare ska kunna välja ett av flera fraktalternativ (G)
+    Lösning:

-Tillgängliga fraktalternativ ska vara hämtade från databasen (G)
+    Lösning:

-Administratörer ska kunna rediga vilka kategorier en produkt tillhör (VG)
+    Lösning:

-Administratörer ska kunna skicka nyhetsbrev från sitt gränssnitt, nyhetsbrevet ska sparas i databasen samt innehålla en -titel och en brödtext (VG)
+    Lösning:

-Administratörer ska kunna lägga till och ta bort produkter (VG)
+    Lösning:

```
