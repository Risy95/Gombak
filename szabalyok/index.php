<? xml version = "1.0" encoding = "UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hu" lang="hu">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-109701271-1"></script>
    <!--<script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-109701271-1');
    </script>-->

    <title>Szabályok</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Kovács Kristóf"/>
    <meta name="description" content="Egy webhely, ahol jobban meg lehet ismerni a gombákat"/>
    <meta name="keywords" content="gomba, ehető, mérgező, szabályok, gombagyűjtés, fajták,  "/>
    <meta name="robots" content="index, follow"/>
    <meta name="language" content="Hungarian"/>
    <meta name="googlebot" content="index, follow"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="content-language" content="HU"/>
    <meta name="MobileOptimized" content="width"/>
    <meta name="HandheldFriendly" content="true"/>
    <meta name="google" content="notranslate"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="http://gombasok.000webhostapp.com"/>
    <meta property="og:title" content="Gombások - Ismerje meg velünk a gombákat"/>
    <meta property="og:site_name" content="Gombások"/>
    <meta property="og:description" content="Tudjon meg többet a gombákról, hogy jóízűen elfogyaszthassa őket."/>
    <meta property="og:image:type" content="image/jpg"/>
    <!--    <meta property="og:image" content="http://gombak.000webhostapp.com/kepek/gyapjas4.jpg"/>-->
    <meta property="og:image:width" content="556"/>
    <meta property="og:image:height" content="720"/>
    <meta property="og:locale" content="hu_HU"/>
    <meta property="og:locale:alternate" content="en_US"/>
    <!--    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="../css/1.css" />
    <!--    <link rel="shortcut icon" href="http://gombak.000webhostapp.com/kepek/gyapjas4.jpg" type="image/x-icon"/>-->
    <link rel="shortcut icon" href="../kepek/gyapjas4.jpg" type="image/x-icon"/>

</head>
<body>

<?php ////////////////////////////////////////////////////////////SESSION
session_start();
?>

<!--<hr class="tb"/>-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">

    <!-- Brand -->
    <a class="navbar-brand" href="../">Gombások</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link menu" href="../fajtak">Fajták</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu" href="../szabalyok">Szabályok</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu" href="../rolunk">Rólunk</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu" href="../profil">Profil</a>
            </li>
            <?php
            if (!isset($_SESSION["log"]) || empty($_SESSION["log"])) {
                unset($_SESSION["log"]);
            } else {
                echo "<li class=\"nav-item\">
<a class=\"nav-link menu\" href=\"../logout.php?pn=02\">
<img src=\"../kepek/logout.png\" alt=\"kijelentkezés\" height=\"45\"/></a>
</li>";
            }
            ?>
        </ul>
    </div>
</nav>

<div class="container-fluid">
    <br/>
    <hr/>
    <br/>

    <div>

        <h2>A gombagyűjtés szabályai</h2>

        <p>A kezdő, de a már gyakorlott gyűjtő is csak olyan gombát gyűjtsön étkezésre, amelyet már jól ismer, mint
            étkezési gombát. A gyűjtő által nem ismert gombák maradjanak inkább érintetlenek. Ha valamely ismeretlen
            gombát mégis el akarunk vinni további meghatározás céljából, gondosan különítsük el a többitől. Erre a célra
            jól beváltak: kis papírdobozkák, alufólia, de végső esetben még a mindig kéznél levő papírzsebkendő is
            megteszi. Az ilyen gombákat mindig teljes egészében húzzuk ki a talajból és ne tisztogassuk meg -
            függetlenül attól, hogy étkezési célra milyen módszerrel gyűjtünk. Lehetőleg a termőhely jellemzőit is
            jegyezzük föl.</p>

        <p>Határozási célra csupán 2-3 példányban gyűjtsünk. Az ismeretlen, vagy éppen nem ehetőként ismert gombákat ne
            rúgjuk fel, ne tapossuk össze, ne hagyjunk csatateret magunk után. Ezek a gombák is az erdő képéhez
            tartoznak, fontos elemei a természetnek. Másrészt az is előfordulhat, hogy más gombagyűjtő éppen ezeket a
            gombákat keresi tanulmányi, vagy tudományos célra. Kevés ismeretlen fajt gyűjtsön egyszerre.</p>

        <p>Manapság ismert tény, hogy a gombák, más élőlényekhez hasonlóan veszélyeztetettek és bizonyos védelmet
            érdemelnek. Ezért ajánlatos csak a leggyakoribb ehető fajokat gyűjteni. A ritka, vagy kipusztulóban levő
            fajokat feltétlenül kíméljük! A gombák védelméről hamarosan megjelenő rendelet megadja majd pontosan a
            gyűjthető és védett fajok listáját, és bizonyos gyűjtési korlátozást is bevezet (Vörös Könyv).</p>

        <p>Gombagyűjtési szempontból kerülendő területnek tekintendők a nagyobb ipari létesítmények, autópályák, ismert
            szennyezettségű területek, patakok, folyók ártere. Erdőművelés során (erdőfelújítás, erdőtelepítés,
            nevelővágás, felújító vágás, környezetvédelmi és üdültetési célokat szolgáló egyéb munkálatok, fakitermelés)
            a munkavégzés érdekében vegyszerezés is alkalmazható az aljnövényzet eltávolítása érdekében. A vasúti
            vágányok mentén évente egyszer erős hatású gyomirtó szereket permeteznek ki a vágányok rézsűjére. Ilyen
            helyszíneken ne gombázzunk!</p>

        <p>Két méternél alacsonyabb fiatal erdős területen csak az úton szabad közlekedni, és csak az út mentén szabad
            gombát szedni. Aki gombát gyűjt, annak a jelölt utakat sokszor egyébként sem érdemes elhagynia. A zárt
            lombkoronájú erdővel ellentétben, ahol egyenletesen oszlik el a csapadék a talajon, az erdőszegélyeken és
            utakon nagyobb lehet a nedvességtartalom, ami jobb körülményeket biztosít a gombák számára.</p>

        <p>Figyelembe kell venni az erdészet esetleges rendelkezéseit, tiltásait. Egyes helyeken a vadászat miatt nem
            szabad az erdőbe menni.</p>

        <p>Kezdetben ne tervezzen túl hosszú kirándulásokat! A jelzett, 10 km hosszú turistaút könnyen megduplázódhat
            gombászás közben! Az sem árt, ha tisztában vagyunk vele, hogyan tájékozódjunk az erdőben. Még öreg
            gombászokkal is előfordult már, hogy a gyűjtés lázában eltévedtek. Nem kell szégyellni, hanem fel kell
            készülni az ilyen helyzetre is.</p>

        <p>Legfontosabb alapszabály, hogy ne szedjen gombát az, aki nem ismeri a gyilkos galócát és a fehér gyilkos
            galócát! Fontos, hogy ne rúgjuk fel ezeket sem, mert ezzel csak tovább terjesztjük, a cipőnkön más
            területekre is elvisszük a spóráit. Egyes szerzők a kezdőknek azt ajánlják, hogy eleinte csak csöves
            gombákat (vargányákat) gyűjtsenek. A közöttük előforduló mérgező gombáknak nincs halálos hatásuk és könnyebb
            a felismerésük is.</p>

        <p>Ha fogyasztásra gyűjtünk gombát, biztonsággal fel kell ismerni a fajt. A meghatározást lehetőség szerint
            mindig már a lelőhelyen végezzük el. Figyelmesen vizsgáljuk meg a gomba körül a növényeket, fákat. A
            környezet is segít a határozás pontosságában. Legalább három, a fajra jellemző tulajdonságot állapítsunk
            meg. Vegyük szemügyre a gomba kalapját, lemezein, tönkjén levő ismertető jegyeket. Ha késsel megvágjuk,
            nézzük meg a vágásfelület alakját, esetleges színváltozását, figyeljünk a férgességre. A férges gombát nem
            érdemes hazavinni. A férgek gyorsan szaporodnak, csak az otthoni hulladékhegy nőne tőlük. Tegyük inkább
            vissza termőhelyére, ahol még elszórhatja spóráit. A nagyon fiatal, vagy öreg gombát se szedjük fel. A faji
            bélyegek ezeken nem eléggé kifejezőek, nagyobb a tévedés lehetősége.</p>

        <p>A nagyon öreg, kukacos, rágott, penészes, elázott vagy fagyott példányok étkezési szempontból értéktelenek.
            Maradjanak tehát a termőhelyükön, s így spórák millióit tudják majd szétszórni, amelyekből új micéliumok
            fejlődhetnek. Másrészt gondoljunk arra is, hogy termőtestük hány élőlénynek, pl. rovarnak szolgál
            búvóhelyül, illetve táplálékul a természetben. Fagyás szempontjából van néhány kivétel: pl. a lila pereszke,
            a késői laskagomba, a téli fülőke, amelyek különleges testfelépítésük miatt nem érzékenyek a fagyra.
            Egyébként az éjszakai fagyok okozta megfagyás és az újbóli felengedés a lebomló fehérjék miatt
            kellemetlenségeket okozhat, mint közismerten a mélyhűtött ételeknél is.</p>

        <p>Az egyik legvitatottabb kérdés a gombagyűjtés módja . Nagyon elterjedt vélemény, hogy a gombaismeretében
            magabiztos gyűjtő akkor jár el helyesen, ha a gomba tönkjét a föld fölött elvágva szedi föl a gombát. Így
            nem szárad ki a micélium, illetve nem szedjük fel a felnőtt gomba tövén megbúvó apróságokat. Más vélemények
            szerint az így földben maradó csonk elrothad, és ezzel árt a micéliumoknak. Figyelemre méltó érv, hogy a
            sértetlenül a helyén maradt gomba is elrothad idővel, és ez mégsem árt a micéliumoknak és nem gátolja az
            újabb termőtestek kifejlődését sem. Napjainkban az a nézőpont látszik egyre inkább elfogadottnak, hogy a
            tönk tövével együtt kiemelt gomba megkönnyíti a meghatározást, és a kiszakításnak nem lehet káros hatása. Az
            minősül tehát szakszerű gyűjtésnek , ha a gomba termőtestét gondosan elválasztjuk a talajtól, vagy más
            aljzattól, enyhén kicsavargatva a tönkjét is. Egyidejűleg fedjük be a keletkezett mélyedést avarral, hogy a
            szabaddá vált egészséges micéliumok ki ne száradjanak. A gondos gombagyűjtő után tiszta marad az erdő.</p>

        <p>A begyűjtött étkezésre szánt gombákat legcélszerűbb már az erdőben megtisztítani a rátapadó talajtól,
            levelektől stb. Ügyeljünk azonban arra, hogy a különleges bélyegeket, mint a tönk töve, bocskora,
            burokmaradványa stb. ne károsítsuk meg.</p>

        <p>Ne legyünk telhetetlenek! Csupán a saját, illetve a családi szükségletet kielégítő mennyiséget szedjünk! Az
            otthoni fagyasztási lehetőségeket, vagy a szárítást, illetve más úton való tartósítást beleérthetjük ebbe a
            szükségletbe, de a lelőhelyeken mindig hagyjunk a gombákból, hogy az utánuk következő gombagenerációnak is
            legyen esélye a túlélésre. Ne szedjük le az egymagában álló termőtesteket sem.</p>

        <p>A gombaszedés módjával legalább egyenrangú, ha nem fontosabb kérdés, hogy a talált gombákat hogyan vigyük
            haza. Sohasem szabad a gombákat műanyag zacskóban, vagy szellőzetlen dobozban, egymásra rakva szállítani!
            Befüllednek és rövid idő alatt megromlanak, mert a termőtestekben a szedés után is tovább tartanak az érési,
            biokémiai folyamatok, melyeknek a fülledt, zárt környezet kedvez. Ezért a gombákat kizárólag szellős, tágas
            gyűjtőkosárba vagy átlyukasztott fedelű dobozba tegyük! Nem szabad sok gombát egymásra helyezni, mert a
            saját súlyuk alatt összenyomódnak, összetörnek és felismerhetetlenné válnak.</p>

        <p>Nem kell mindjárt a fazékba kerülnie annak a gombának, amelyről azt hiszi, biztosan felismeri a fajt.
            Legalább eleinte győződjön meg róla egy elismert szakember segítségével, hogy nem nézett-e el valamit, nem
            határozott-e tévesen. Minden piacon, ahol vadon termő gombát is árulnak, van gombaszakértő. Hétvégeken pedig
            egyes nagyobb városokban, ahol több kiránduló megfordul, gombavizsgáló helyeket jelöltek ki. A Magyar
            Mikológiai Társaság honlapján egyértelműen úgy fogalmaznak, hogy aki nem vizsgázott gombaszakértő, az soha
            ne készítsen el úgy gombás ételt, hogy előtte a gombákat nem ellenőriztette. Az ellenőrzéskor a teljes
            gombagyűjtésüket fajonként elkülönítve kell bemutatni. Külön az étkezésre gyűjtött gombákat, illetve
            elkülönítve az ismeretlen, tanulmányozandó vagy határozásra szánt fajokat. A gombaszakértői ellenőrzést
            komolyan kell venni! Csak a kifogástalanul ellenőrzött vagy meghatározott gomba véd meg a
            gombamérgezéstől.</p>

        <p>Ha gombamérgezésre utaló jeleket tapasztalunk (rosszullét, hasmenés, hányás), azonnal orvost kell hívni.
            Különösen sürgős az orvosi kezelés a hosszabb idő (5 -6 óra) elteltével jelentkező tüneteknél, mert ez az
            erősen mérgező tulajdonságú gombákra jellemző.</p>

        <p>Idegen tájakon, országokban legyünk óvatosak a gombák étkezési célra való gyűjtésében. Itt ugyanis gyakran
            olyan fajok nőnek, amelyek meglehetősen hasonlítanak a mi hazai gyűjtési körzetünkben található fajokhoz, de
            mérgezőek.</p>

        <p>A galambgombákon, vargányákon, az ízletes rizikén és a nagy őzlábgombán kívül (természetesen ezeket is csak
            ha nagyon jól ismerjük) sohase ízlelgessünk, kóstolgassunk nyersen gombát! Csupán egyetlen kóstolási próba
            is súlyos mérgezéshez, a gyilkos galócánál halálhoz vezethet!</p>

        <p>Még napjainkban is nagyon elterjedtek a népi gombahatározásban egyes hiedelmek az ehetőség eldöntésére
            vonatkozóan. A Miskolci Gombász Egyesület élőgomba kiállításain rendszeresen találkozunk a látogatók között
            ezekben még ma is hivő emberekkel. Le kell tehát ismételten szögezni: A vágási felületén színt változtató
            gomba nem mind mérgező, sőt nagyon sok ízletes ehető gomba van közöttük. Ugyanakkor pl. a gyilkos galóca
            húsa minden körülmény között fehér marad. A rovarrágta, csigarágta gomba nem mindig ehető - a mérgező gombát
            is megrágja a csiga. Az ezüstkanál próba semmit nem jelent a gomba mérgező voltát illetően. A hagyma és a
            petrezselyem színe a mérgező gombától nem változik meg. A gomba feltűnő színe önmagában nem jelenti azt,
            hogy mérgező lenne. Nem minden kellemes illatú és ízű gomba ehető. A háziállatoknál mérgezési tüneteket nem
            okozó gombafaj emberre mérgező is lehet. Minden babonát, téveszmét nyilvánvalóan nem tudunk itt felsorolni.
            Ezért általánosan jelentjük ki, hogy a gombahatározásnak csak egyetlen biztos módszere van: a megfelelően
            megalapozott tudásra épülő fajonkénti gombaismeret! Ha ilyen tudással nem rendelkezünk, forduljunk
            gombaszakértőhöz - vagy annak hiányában inkább ne fogyasszuk el a gombát.</p>

        <p>Ha tehetjük, túráinkra vigyünk magunkkal egy kisméretű gombahatározó könyvet. Nem az abban leírtak szolgálják
            a végső meghatározást, de sok esetben legalább a kapitális hibáktól megvédhetnek. Persze csak akkor, ha
            tudjuk, hogyan használjuk a gombászkönyvet? A hivatkozott cikk ebben nyújt segítséget olvasóinknak.</p><br/>

        <h2>A gombák elkészítési és felhasználási szabályai</h2>

        <p>A szakszerűen kosárba gyűjtött és már ellenőrzött gombákat otthon mielőbb tisztítsuk meg, lehetőség szerint
            minél előbb használjuk is fel. Ha nincs időnk még aznap elkészíteni, úgy mindig hideg, hűvös helyen, jól
            szellőző körülmények között végezzük a tárolást, egy rétegben kiterítve a gombákat. Ne tároljuk a gombát
            napokig, 24 órán belül használjuk fel! Erre nem csak az ételmérgezés elkerülése érdekében, hanem a gombákban
            esetleg mégis megtalálható férgek nagyobb arányú kártételének megelőzése miatt is szükség van. Egyes
            gombafajok különösen hajlamosak a gyors tönkremenetelre.</p>

        <p>Minden olyan mozdulat, amikor a gombát a tárolás vagy feldolgozás során kézbe vesszük, újabb alkalom a
            meghatározás kontrollálására. Időközben elváltozhat a gomba színe, állaga, észrevehetünk rajta olyan
            jellegzetességet, amire korábban nem figyeltünk fel. Ez legtöbbször megerősíti a korábbi meghatározást, de
            olykor előfordulhat, hogy elbizonytalanodunk. Fontos gyakorlati tanács: ha bármikor elbizonytalanodunk
            abban, hogy annak a fajnak a példányát tartjuk kezünkben, ami korábban meghatározásra került, inkább dobjuk
            el!</p>

        <p>Elkészítéskor a gombák tönkjének felhasználhatóságára figyeljünk oda. Néhány ehető kalapú gomba tönkje
            mérgező. Vannak ugyanakkor olyan fajok, amelyek tönkjének felhasználása kifejezetten ajánlott, mert élvezeti
            értéke megegyezik a kalapéval, tömege pedig olykor kiadósabb magánál a kalapnál. Más fajoknál a tönköt el
            kell távolítani, mert szívós, rágós, élvezhetetlen. Különösen a fán termő gombák tönkje szívós, rostos,
            kemény, ezeket feltétlenül vágjuk le. Itt jegyezzük meg, hogy szándékosan nem írunk konkrét példákat - a
            konkrétumoknak a gomba meghatározásakor, az azt ismerő szakember által kell megállapításra kerülnie.</p>

        <p>Elkészítéskor a gombákat vagdossuk kis darabokra, a rovarrágott részeket dobjuk el! Az így előkészített
            gombát mielőbb főzzük vagy süssük meg, illetve szándékunk szerint a különféle recepteknek megfelelően
            tartósítsuk.</p>

        <p>A gombákat lehetőleg daraboljuk apróra és fogyasztáskor alaposan rágjuk meg az ételt. Erre elsősorban azért
            van szükség, mert a gomba számos előnyös fogyasztási tulajdonsága mellet (zsírszegény, kis kalóriatartalmú
            stb), nehezen emészthető étel. Az emberek alkati adottságai természetesen eltérőek e tekintetben, de
            általános szabály, hogy ne adjunk gombás ételt kisgyermekeknek és érzékeny gyomrú embereknek, a gombákra
            kimutatottan allergiás emberekről nem is beszélve.</p>

        <p>Kerüljük a túl nagy mennyiségű gomba fogyasztását is! Izzasztó helyzet, amikor nem tudjuk eldönteni, hogy a
            túl hirtelen, vagy túl nagy mennyiségben fogyasztott gombás ételtől vannak furcsa érzéseink, vagy talán
            mégis mérgező gomba került az ételbe?</p>

        <p>Vannak olyan ehető gombák, amelyek hőre bomló méreganyagokat tartalmaznak. Például a gyűrűs tuskógomba, a
            selyemgomba, a változékony tinóru sütve, főzve ehető, de nyersen mérgező. Figyelni kell az elkészítés
            módjára! Ha a háziasszony gombás húspogácsát készít, forró zsírban gyorsan szép barnára süti, de az étel
            közepe nem forrósodik át, esetleg az egész család mehet gyomormosásra. Pedig egyébként micsoda élvezet egy
            gyűrűs tuskógombából jól elkészített gombafasírt fogyasztása! Itt említenék egy másik, eléggé elterjedt
            babonát is, miszerint minden gomba ehető, ha leforrázzák, hosszabb ideig főzik. Ez a gyűrűs tuskógomba és
            még néhány más faj esetében igaz, azonban a forró vízben éppen a gyilkos galócák és más mérgező gombák
            hatóanyaga nem pusztul el. Ezek forrázás, főzés után is halálosan mérgezőek maradnak.</p>

        <p>Minden gombász próbálja megelőzni a mérgezést, de azért készüljön fel az elsősegélynyújtásra is! Erről a
            témáról "Mit tegyünk gombamérgezés gyanúja esetén" címmel önálló cikket olvashatnak honlapunkon.</p>

        <p>Néhány gombafaj egyidejű alkoholfogyasztás hatására gombamérgezés jellegű megbetegedést okoz, mások többszöri
            fogyasztás után fejtik csak ki mérgező hatásukat stb. Egy ilyen általános jellegű szabálygyűjtemény nem
            térhet ki minden egyedi jellegzetességre. Ezért ismételten csak a gombák pontos egyedi meghatározására
            tudjuk felhívni a figyelmet! Ott minden ilyen jellegzetesség is kiderül.</p>

        <p>Az ilyen szabálygyűjteményeknek az a kellemetlen mellékhatásuk, hogy miközben felhívják a figyelmet a
            különféle veszélyekre, sok kezdő gombászt el is riasztanak ezzel a gombás ételek fogyasztásától. Egyáltalán
            nem ez a szándékunk - ennek bizonyítására szeretnénk felhívni a figyelmet a gombás ételrecepteket tartalmazó
            könyvek sokaságára, az egészséges táplálkozásban a gombafogyasztás iránt egyre növekvő igényre, és nem
            utolsó sorban a honlapunkon közölt receptekre, melyek saját kísérletező kedvű egyesületi tagjaink sikeres
            alkotásai.</p>
    </div>

    <a href="http://www.miskolcigombasz.hu/tudni_illik/a_gombagyujtes_szabalyai">forrás:</a>

    <br/><?php
    echo date("Y.m.d.");

    ?><hr /><br />

</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="../javascript/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>
</html>