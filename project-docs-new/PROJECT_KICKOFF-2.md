# 1. Souhrn Projektu a Strategie

### 1.1. Klient a Cíl

- **Klient:** Restaurace "Osoleno", prémiový podnik specializující se na moderní a vysokou kuchyni zaměřenou na pokrmy z kachny.
- **Hlavní cíl projektu:** Vytvořit elegantní, vícejazyčnou webovou prezentaci, která bude sloužit jako digitální vizitka restaurace, přiláká nové zákazníky, umožní pohodlnou online rezervaci stolů a nabídne jednoduchý systém objednávek polotovarů a dezertů k vyzvednutí/doručení.

### 1.2. Cílová Skupina

- **Primární:** Milovníci gastronomie a vysoké kuchyně ve věku 30-60 let s vyššími příjmy, kteří aktivně vyhledávají unikátní kulinářské zážitky.
- **Sekundární:** Zahraniční turisté navštěvující Prahu, kteří hledají autentickou, ale zároveň luxusní českou kuchyni.
- **Terciární:** Firmy hledající reprezentativní prostory pro obchodní večeře či menší firemní akce.

### 1.3. Klíčový Prodejní Argument (USP)

**"Mistrovství kachních specialit v srdci Prahy."** Osoleno se odlišuje úzkou specializací na kachní maso v nejrůznějších podobách, od tradičních receptů v moderním pojetí až po inovativní kulinářské kreace, a to vše v luxusním a přesto útulném prostředí.

---

# 2. Architektura Informací a Struktura Stránek (UX Design)

### 2.1. Mapa Stránek (Sitemap)

- **/ (Úvod)** - Hlavní vstupní stránka
- **/o-nas** - Příběh restaurace, šéfkuchař a hodnoty
- **/menu** - Kompletní jídelní a nápojový lístek
- **/blog** - Články, novinky a události
- **/kontakt** - Kontaktní údaje a rezervační formulář
- **/e-shop** - Objednávkový systém pro rozvoz/vyzvednutí
  - **/e-shop/kosik** - Nákupní košík
  - **/e-shop/ucet** - Uživatelský účet s historií objednávek

### 2.2. Detailní Struktura Stránek (Wireframes)

#### **Stránka: Úvod (`/`)**

- **Cíl:** Okamžitě zaujmout návštěvníka, představit atmosféru a unikátní nabídku restaurace a vést ho k rezervaci stolu.
- **Psychologie Pořadí:** Od vizuálního vtažení, přes rychlé pochopení konceptu, k ochutnávce nabídky a snadnému provedení akce (rezervace).
  1.  **Hero Sekce:** Působivá, celoobrazovková fotografie vlajkového jídla s krátkým, úderným sloganem (např. "Umění z kachny. Dokonalost na talíři.") a tlačítkem "Rezervovat stůl".
  2.  **Představení Konceptu:** Krátký text o filozofii restaurace, který zdůrazňuje specializaci na kachnu a vysokou kvalitu. Doplněno fotografií interiéru.
  3.  **Ukázka z Menu:** Výběr 3-4 exkluzivních pokrmů (např. Parfait Royale, Kachní Filé, Burger s Foie Gras) s proklikem na kompletní menu. Vizuálně podpořeno **fotkami z `PHOTOGRAPHY_PLAN.md`**.
  4.  **Sekce "Zážitek v Osoleno":** Zvýraznění klíčových benefitů – např. "Sezónní suroviny", "Mistrovství šéfkuchaře", "Nezapomenutelná atmosféra". Podpořeno ikonami a fotografií interiéru.
  5.  **Společenský Důkaz & CTA:** Krátké reference od spokojených zákazníků nebo odkaz na nejnovější článek na blogu, následovaný výrazným blokem s rezervačním formulářem.

#### **Stránka: O nás (`/o-nas`)**

- **Cíl:** Vybudovat důvěru a osobní vztah se zákazníkem skrze příběh a tváře stojící za restaurací.
- **Psychologie Pořadí:** Od obecného příběhu, přes konkrétní osoby, k hmatatelným hodnotám a vizuálnímu potvrzení atmosféry.
  1.  **Náš Příběh:** Vizuálně atraktivní sekce s fotografií zakladatelů nebo šéfkuchaře a emotivním textem o vzniku a vizi restaurace.
  2.  **Seznamte se se Šéfkuchařem:** Medailonek šéfkuchaře – jeho zkušenosti, filozofie vaření, inspirace. Doplněno profesionálním portrétem.
  3.  **Naše Hodnoty:** Přehledné body (např. Čerstvost, Kreativita, Tradice, Pohostinnost) s krátkými popisky a ikonami.
  4.  **Galerie Interiéru:** Prezentace fotografií restaurace, které ukazují design, atmosféru a detaily. **Zde budou použity dodané fotografie interiéru.**
  5.  **Přidejte se k Nám:** Informace o kariérních příležitostech nebo výzva ke sledování na sociálních sítích.

#### **Stránka: Menu (`/menu`)**

- **Cíl:** Přehledně a lákavě prezentovat kompletní nabídku jídel a nápojů, včetně cen a alergenů.
- **Psychologie Pořadí:** Uživatel očekává jasnou strukturu. Začneme jídlem, které je hlavním lákadlem, a postupujeme k nápojům. Filtrování usnadní orientaci.
  1.  **Úvodní Sekce:** Krátký úvod od šéfkuchaře o aktuálním sezónním menu.
  2.  **Snídaňové Menu:** Samostatná, přehledná sekce.
  3.  **Sezónní Menu:** Rozděleno do kategorií (Předkrmy, Polévky, Hlavní chody) s možností filtrování (např. "Kachní speciality", "Vegetariánské"). U každého jídla bude název, popis, cena a alergeny.
  4.  **Nápojový Lístek:** Přehledně rozděleno na Káva, Nealko, Piva, Vína, Koktejly atd.
  5.  **Informace o Alergenech:** Jasně viditelný odkaz na kompletní seznam alergenů a poznámka o možnosti konzultace s obsluhou.

#### **Stránka: E-shop (`/e-shop`)**

- **Cíl:** Poskytnout jednoduchý způsob, jak si objednat vybrané produkty domů, a spravovat své objednávky.
- **Psychologie Pořadí:** Jasně vysvětlit proces, ukázat nabídku, umožnit snadný výběr a dokončit objednávku v přehledném formuláři.
  1.  **Jak to funguje:** Jednoduchý grafický návod ve 3 krocích: 1. Vyberte, 2. Vyplňte údaje, 3. Zaplaťte při převzetí.
  2.  **Nabídka Produktů:** Mřížka produktů (např. mražené kachní riettes, paštiky, dezerty) s fotkou, názvem, cenou a tlačítkem "Přidat do košíku". Možnost filtrování dle kategorií.
  3.  **Košík (dynamický komponent):** Přehled vybraných položek, celková cena.
  4.  **Objednávkový Formulář:** Pole pro jméno, příjmení, e-mail, telefon a doručovací adresu.
  5.  **Můj Účet:** Sekce, kde se uživatel může přihlásit/zaregistrovat pro zobrazení historie svých objednávek.

#### **Stránka: Blog (`/blog`)**

- **Cíl:** Poskytovat hodnotný obsah, posilovat SEO a budovat komunitu okolo značky.
- **Psychologie Pořadí:** Od nejnovějšího obsahu k možnostem hlubšího ponoru a interakce.
  1.  **Nejnovější Článek (Featured Post):** Vizuálně výrazná upoutávka na poslední publikovaný článek.
  2.  **Výpis Článků:** Mřížka s dalšími články (obrázek, titulek, perex, datum).
  3.  **Kategorie a Vyhledávání:** Možnost filtrovat články podle témat (Recepty, Ze zákulisí, Akce).
  4.  **Slovo Šéfkuchaře:** Speciální sekce pro krátké tipy, triky nebo myšlenky přímo od šéfkuchaře.
  5.  **Odběr Novinek:** Formulář pro přihlášení k odběru newsletteru.

#### **Stránka: Kontakt (`/kontakt`)**

- **Cíl:** Poskytnout veškeré potřebné kontaktní informace a usnadnit rezervaci.
- **Psychologie Pořadí:** Nejdůležitější informace (adresa, telefon) jako první, následované formuláři pro specifické akce.
  1.  **Kontaktní Informace a Otevírací Doba:** Přehledně uspořádaná adresa, telefon, e-mail.
  2.  **Mapa:** Interaktivní mapa (např. Google Maps) s vyznačenou polohou restaurace.
  3.  **Rezervační Formulář:** Klíčový prvek stránky. Pole pro datum, čas, počet osob, jméno, kontakt.
  4.  **Kontaktní Formulář:** Pro obecné dotazy, které nesouvisí s rezervací.
  5.  **Často Kladené Otázky (FAQ):** Odpovědi na běžné dotazy (parkování, bezbariérový přístup, možnosti platby).

---

# 3. Obsahová Strategie a Copywriting

### 3.1. Tonalita Komunikace

**Prémiová, vášnivá a sebevědomá.** Mluvíme jazykem, který je sofistikovaný, ale srozumitelný. Vyjadřujeme hlubokou znalost a lásku k našemu řemeslu. Vyhýbáme se klišé a prázdným frázím. Každé slovo má svou váhu. Texty jsou stručné, ale plné významu.

### 3.2. Návrhy Textů (Copywriting)

- **Home - Hero Slogan:** "Osoleno. Tam, kde se kachna stává uměním."
- **Home - Představení Konceptu:** "V Osoleno věříme, že jeden pokrm, dovedený k absolutní dokonalosti, vydá za tisíc průměrných. Proto jsme svůj um a vášeň zasvětili kachně. Od klasických konfitovaných stehen po odvážné moderní kreace – objevte s námi nekonečné chuťové dimenze, které toto ušlechtilé maso nabízí. Vítejte v Osoleno. Vítejte v ráji pro milovníky kachny."
- **About Us - Náš Příběh:** "Osoleno nevzniklo přes noc. Zrodilo se z desítek let zkušeností, z cest po světě a z jedné prosté myšlenky: vytvořit v Praze místo, kde bude kachna hlavní hvězdou, nikoli jen položkou v menu. Jsme posedlí detailem, od výběru lokálních farmářů až po poslední lístek bylinky na vašem talíři. Naším posláním je servírovat nejen jídlo, ale zážitek, na který se nezapomíná."

---

# 4. Vizuální a Designová Strategie

### 4.1. Zdůvodnění Designu

Designový systém definovaný v `visualIdentity.json` přímo odráží identitu restaurace Osoleno.

- **Barevná paleta** je inspirována interiérem podniku – hluboká modř (`#16263E`) evokuje eleganci a klid, zatímco teplé dřevité a zlatavé tóny (`#B18B6B`, `#8A442C`) dodávají pocit luxusu a útulnosti. Kontrastní bílá a tmavě šedá zajišťují čitelnost a moderní vzhled.
- **Typografie** kombinuje klasickou eleganci patkového písma `Playfair Display` pro nadpisy s moderní čistotou a skvělou čitelností bezpatkového `Inter` pro tělo textu. Tato kombinace podtrhuje spojení tradiční vysoké kuchyně s moderním přístupem.
- **Layout** s velkorysým využitím prostoru, jemnými stíny a zaoblenými rohy vytváří pocit vzdušnosti a prémiové kvality.

### 4.2. Práce s Médii

Pro úvodní fázi vývoje a prototypování webu **musí být použity výhradně fotografie definované v souboru `PHOTOGRAPHY_PLAN.md`**. Tento soubor slouží jako vizuální manuál a zajišťuje, že dočasné obrázky budou v naprostém souladu s požadovanou atmosférou.

Finální fotografie musí být profesionální, s důrazem na detail a atmosféru. Styl by měl být mírně dramatický, s hrou světla a stínu, aby vynikla textura a barvy jídla. Fotografie interiéru musí zachytit luxusní, ale zároveň přívětivou atmosféru.

### 4.3. Strategie Použití Ikon

- **Styl Ikon:** Budou použity **minimalistické, tenké linkové (outline) ikony** z jednotné sady (doporučení: Lucide Icons nebo Heroicons). Tento styl ladí s moderní a elegantní estetikou webu.
- **Funkce a Umístění:**
  - V sekci "Naše Hodnoty" pro vizuální reprezentaci klíčových slov (např. pírko pro lehkost, srdce pro vášeň).
  - V kontaktních informacích pro telefon, e-mail a adresu.
  - V navigačním menu u položek "Košík" a "Můj Účet".
  - Pro označení kroků v návodu "Jak funguje e-shop".
  - U tlačítek pro sociální sítě v patičce webu.

---

# 5. Funkční Požadavky

### 5.1. Detailní Popis Funkcí

#### **Rezervační Systém:**

- Musí být implementován pomocí PHP a ukládat data do databáze MariaDB.
- Formulář bude obsahovat pole: Jméno, E-mail, Telefon, Datum, Čas (výběr z předdefinovaných slotů, např. po 30 min), Počet osob.
- Po odeslání formuláře proběhne validace dat.
- Systém odešle potvrzovací e-mail zákazníkovi s rekapitulací rezervace.
- Současně systém odešle notifikační e-mail restauraci s detaily nové rezervace.
- Měla by existovat jednoduchá administrace (chráněná heslem) pro personál restaurace, kde uvidí přehled všech rezervací na daný den/týden.

#### **E-shop a Uživatelské Účty:**

- **Nejedná se o plnohodnotný e-shop s platební bránou.**
- Uživatelé si musí vytvořit účet (Jméno, E-mail, Heslo, Telefon, Adresa) pro dokončení objednávky.
- Po přihlášení může uživatel přidávat produkty do košíku.
- "Checkout" proces je ve skutečnosti odeslání objednávky. Uživatel potvrdí položky v košíku a svou doručovací adresu.
- Po odeslání se objednávka uloží do databáze (spojená s uživatelským účtem).
- Systém odešle e-mail s rekapitulací objednávky zákazníkovi a notifikační e-mail restauraci.
- V sekci "Můj Účet" musí přihlášený uživatel vidět přehled a historii svých minulých objednávek.
- Platba probíhá až při předání (hotově / QR kód od kurýra). Na webu se žádný QR kód negeneruje.

#### **Vícejazyčnost:**

- Web bude primárně v CZ. Překlady do ENG, UKR, DE budou implementovány až po kompletním dokončení a schválení české verze. Je nutné od začátku navrhovat systém tak, aby byl na budoucí překlady připraven (např. texty v samostatných souborech/databázi, nikoli natvrdo v kódu).

---

# 6. Technologické a SEO Poznámky

### 6.1. Návrh Klíčových Slov

- **Primární:** "restaurace Osoleno", "kachní restaurace Praha", "kachní speciality Praha".
- **Sekundární:** "vysoká kuchyně Praha", "luxusní večeře Praha", "rezervace restaurace Praha", "moderní česká kuchyně".
- **Long-tail:** "kam na kachnu v Praze", "burger s foie gras Praha", "confitované kachní stehno Praha".

### 6.2. Doporučení pro Vývoj

- **Technologický Stack:** Vzhledem k požadavkům na rezervační systém a e-shop s uživatelskými účty **není možné web realizovat jako čistě statický web**. Je nutné využít specifikace hostingu. Doporučeným řešením je **dynamický web postavený na PHP 8+ a databázi MariaDB**.
- **Backend:** Veškerá funkcionalita (rezervace, správa uživatelů, objednávky) bude řešena na straně serveru pomocí PHP skriptů, které budou komunikovat s databází.
- **Frontend:** Pro moderní a interaktivní uživatelské rozhraní se doporučuje využít vanilla JavaScript nebo lehkou knihovnu jako Alpine.js, aby se zamezilo zbytečné komplexitě.
- **Prototypování:** Pro vývoj a prototypování uživatelského rozhraní **musí být použity obrázky z `PHOTOGRAPHY_PLAN.md`**, aby byl vizuální dojem co nejbližší finálnímu produktu.
- **SEO:** Všechny stránky musí mít správně strukturovaný HTML kód (sémantické tagy), vyplněné meta tituly a popisky (možnost jejich správy by byla výhodou), a texty by měly přirozeně obsahovat navržená klíčová slova.
