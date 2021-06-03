<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

/*        $modules_types = [
            ["name"=> "Valodas un komunikatīvās zinības"], //1
            ["name"=> "Matemātika, dabas zinības un tehniskās zinības"], // 2
            ["name"=> "Sociālās zinības un kultūrizglītība"], // 3
            ["name"=> "Mūžizglītības kompetenču mācību kursi"], // 4
            ["name"=> "Profesionālo kompetenču mācību kursi"], //5
        ];

        DB::table('modules_types')->insert($modules_types);*/


        $modules = [
            ["name" => "Algoritmizācijas pamati"],
            ["name" => "Apdrošīnāšanas pamati"],
            ["name" => "Apģērba dizains"],
            ["name" => "Apģērbu izgatavošanas tehnoloģija"],
            ["name" => "Apģērbu konstruēšana un modelēšana "],
            ["name" => "Apmešanas tehnoloģija"],
            ["name" => "Angļu valoda profesijā"],
            ["name" => "Arhitektonisko būvelementu veidošana"],
            ["name" => "Atslēdznieka darba tehnoloģija"],
            ["name" => "Atslēdzniecības pamati"],
            ["name" => "Aksesuāru izgatvošana"],
            ["name" => "Automatizētā projektēšana "],
            ["name" => "Automobiļu elektroiekārta"],
            ["name" => "Automobiļu tehniskā apkope  un diagnostika"],
            ["name" => "Automobiļu un motoru remonts"],
            ["name" => "Automobiļu uzbūve"],
            ["name" => "Automobiļu uzbūves pamati"],
            ["name" => "Ārējo  elektrotīklu tehniskā ekspluatācija"],
            ["name" => "Banku grāmatvedība"],
            ["name" => "Bāra pakalpojumi"],
            ["name" => "Bāra serviss"],
            ["name" => "Bioloģija "],
            ["name" => "Biroja darba nodrošināšana"],
            ["name" => "Biznesa plāna izstrāde"],
            ["name" => "Budžeta izstrāde un kontrolēšana"],
            ["name" => "Būvdarbu tehnoloģija"],
            ["name" => "Ciparu vadības darbgaldi"],
            ["name" => "Celtniecisko būvmateriālu veidošana"],
            ["name" => "Dabaszinības"],
            ["name" => "Darba aizsardzība"],
            ["name" => "Darba un vides aizsardzība"],
            ["name" => "Darba organizācija un šūto izstrādājumu izgatavošanā"],
            ["name" => "Darba drošība un aizsardzība"],
            ["name" => "Darba organizēšana "],
            ["name" => "Darba un komerctiesības "],
            ["name" => "Darba un saistību tiesības "],
            ["name" => "Darbgaldu pneimatika  un hidrauliskā piedziņa "],
            ["name" => "Darbs ražošanas uzņēmuma noliktavā"],
            ["name" => "Darbs spriegumaktīvā vidē "],
            ["name" => "Darbs tirdzniecības uzņēmuma noliktavā"],
            ["name" => "Darījumu matemātika "],
            ["name" => "Datorgrafika "],
            ["name" => "Datordizains "],
            ["name" => "datorgrafika un multimediji"],
            ["name" => "Datorgrāmatvedība"],
            ["name" => "Datorsistēmu uzbūve"],
            ["name" => "Datortīkli un to administrēšana "],
            ["name" => "Datortehnikas komplektēšana un montāža  "],
            ["name" => "Datoru lietojumu programmas"],
            ["name" => "Datu bāzes"],
            ["name" => "Dekoratīvās krāsošanas tehnoloģija"],
            ["name" => "Demontāža, montāža"],
            ["name" => "Diskrētās matemātikas pamati"],
            ["name" => "Dizaina pamati"],
            ["name" => "Drēbnieka prakse"],
            ["name" => "Dokumentu pārvaldība"],
            ["name" => "Drošība uz kuģa (SOLOSS)"],
            ["name" => "Ekonomika"],
            ["name" => "Ekonomiskā ģeogrāfija"],
            ["name" => "Elektriskās mašīnas un elektriskā piedziņa"],
            ["name" => "Elektriskās mašīnas un elektriskā piedziņa"],
            ["name" => "Elektriskie mērījumi"],
            ["name" => "Elektriskie mērījumi un sensori"],
            ["name" => "Elektriskie mērījumi un sensori"],
            ["name" => "Elektrisko mašīnu  un iekārtu ekspluatācija "],
            ["name" => "Elektrisko mašīnu un iekārtu pieslēģšana "],
            ["name" => "Elektroapgāde"],
            ["name" => "Elektrodrošība elektroietaišu tehniskās ekspluatācijas un elektromontāžas  darbos "],
            ["name" => "Elektroenerģētikas pamatprocesi un elektrotehnisko darbu veidi"],
            ["name" => "Elektroenerģijas pārvades līniju izbūve"],
            ["name" => "Elektroiekārtas , montāža un remonts"],
            ["name" => "Elektroiekārtas, montāža u n remonts"],
            ["name" => "Elektroietaišu montāžas atslēdznieka darbi"],
            ["name" => "Elektroietaišu montāžas palīgdarbi"],
            ["name" => "Elektromontāžas darbu organizēšana "],
            ["name" => "Elektromontiera darba tehnoloģija"],
            ["name" => "Elektromontāžas darbi"],
            ["name" => "Elektromontiera darbi"],
            ["name" => "Elektronikas pamati un PLC progr."],
            ["name" => "Elektrotehnika, elektrodrošiba"],
            ["name" => "Elektrotehnikas pamati un elektriskie mērījumi"],
            ["name" => "Elektrotehnikas un elektronikas pamati"],
            ["name" => "Elektrotehnikas un elektronikas pamati"],
            ["name" => "Elektrotehniķa darba tehnoloģija"],
            ["name" => "Elektrotehniķa prakse"],
            ["name" => "Elektrotehniskas  teorētiskie pamati"],
            ["name" => "Elektrotehniskā dokumentācija "],
            ["name" => "Elektrotīklu izbūves  būvmašīnu vadīšana "],
            ["name" => "Enerģētikas pamatprocesi, elektrotehnisko darbi"],
            ["name" => "Elektroietaišu montāžas palīgdarbi"],
            ["name" => "Elektroietaišu montāžas atslēdznieka darbi"],
            ["name" => "Ēdienkartes plānošana un sastādīšana "],
            ["name" => "Ēdienu gatavošnas tehnoloģija"],
            ["name" => "Ēdienu noformēšanas pamati"],
            ["name" => "Ēdināšanas uzņēmuma darba organizācija"],
            ["name" => "Ēdināšanas uzņēmumu aprīkojums"],
            ["name" => "Ēku iekšējo elektrotīklu  tehniskā ekspluatācija "],
            ["name" => "Ēku siltināšana "],
            ["name" => "EIKT pamatprocesi un darbu veidi"],
            ["name" => "EIKT nozares tehnisko darbu pamatiemaņas"],
            ["name" => "Finanses un kredīts"],
            ["name" => "Finanšu analīze"],
            ["name" => "Finanšu matemārtika"],
            ["name" => "Fizika "],
            ["name" => "Frizieru darba tehnoloģija"],
            ["name" => "Flīzēšanas , grīdu ieklāšanas tehnoloģija"],
            ["name" => "Gadlniecības izstrādājumu konstrukcijas "],
            ["name" => "Grāmatvedība"],
            ["name" => "Grāmatvedības pamati"],
            ["name" => "Grāmatvedības un uzņēmējdarbības pamati"],
            ["name" => "Ģeogrāfija "],
            ["name" => "Ievads specialitātē "],
            ["name" => "Informācijas un komunikācijas tehnoloģijas  (1., 2.līmenis)"],
            ["name" => "Informātika "],
            ["name" => "Iniciatīva un uzņēmējdarbība"],
            ["name" => "Interjers"],
            ["name" => "Jaunākā tehnoloģija"],
            ["name" => "Kalkulācija un uzskaite"],
            ["name" => "Kāzu tērpi un vakartērpu izgatavošana"],
            ["name" => "Klientu apkalpošana "],
            ["name" => "Kokapstrādes tehnoloģija"],
            ["name" => "Koksnes aizsardzība un apdare"],
            ["name" => "Komerczinības uzņēmuma vadībā"],
            ["name" => "Komercdarbinieka prakse"],
            ["name" => "Komercdarbības uzņēmumu vadība"],
            ["name" => "Konditorejas aprīkojums"],
            ["name" => "Konditorejas izstrādājumu izgatavošanas tehnoloģija"],
            ["name" => "Konditorejas izstrādājumu noformēšana "],
            ["name" => "Konditorejas uzņēmumu, ražotņu  darba organizācija "],
            ["name" => "Kravu identificēšana"],
            ["name" => "Krāsošanas, tapešu līmēšanas tehnoloģija"],
            ["name" => "Kredītiestāžu mācība"],
            ["name" => "Kulturoloģija "],
            ["name" => "Kustību un runas kultūra"],
            ["name" => "Kvalifikācijas prakse"],
            ["name" => "Kvalitātes nodrošināšanas pamati"],
            ["name" => "Kuģa uzbūves pamati"],
            ["name" => "Ķīmija "],
            ["name" => "Latviešu valoda "],
            ["name" => "Latvijas un pasaules vēsture "],
            ["name" => "Lietišķā komunikācija"],
            ["name" => "Lietišķā svešvaloda"],
            ["name" => "Lekālu apstrāde"],
            ["name" => "Lietišķā informātika"],
            ["name" => "Lietvedība"],
            ["name" => "Literatūra "],
            ["name" => "Loģistikas pamati"],
            ["name" => "Loģistika"],
            ["name" => "Matemātika "],
            ["name" => "Materiālmācība"],
            ["name" => "Metināšanas iekārtas"],
            ["name" => "Metināšanas tehnoloģija metināšanā ar MAG iekārtām "],
            ["name" => "Materiālmācība un metālapstrādes tehnoloģijas"],
            ["name" => "Materiālu mācība"],
            ["name" => "Mazā uzņēmuma darba vadīšana"],
            ["name" => "Mācību birojs"],
            ["name" => "Mārketings"],
            ["name" => "Maizes un konditorijas izstrādājumu izgatavošanas tehnoloģija"],
            ["name" => "Mehatroniskās sistēmas "],
            ["name" => "Metālapastrādes pamati"],
            ["name" => "Metināšanas tehnoloģija"],
            ["name" => "Metālapstrādes pamatprocesi"],
            ["name" => "Metālu detaļu izgatavošanas tehniskā dokumentācija"],
            ["name" => "Metāla virsmas apstrāde"],
            ["name" => "Moderno tehnoloģiju pielietojums komercdarbībā"],
            ["name" => "Modernās tehnoloģijas"],
            ["name" => "Nodokļi un nodevas "],
            ["name" => "Noliktavu darbība"],
            ["name" => "Objektorientētās programmēšanas pamati"],
            ["name" => "Operētājsistēmas "],
            ["name" => "Otrā profesionālā svešvaloda"],
            ["name" => "Otrā svešvaloda "],
            ["name" => "Pakalpojumu sniegšanas organizēšana"],
            ["name" => "Pārtikas preču zinības "],
            ["name" => "Piegādes un transporta procesa loģistika"],
            ["name" => "Piegriešana"],
            ["name" => "Pielaides un sēžas"],
            ["name" => "Pielaides un tehniskie mērījumi"],
            ["name" => "Pirmā profesionālā svešvaloda"],
            ["name" => "Pirmā svešvaloda"],
            ["name" => "Politika un tiesības "],
            ["name" => "projektu vadība"],
            ["name" => "Prakse komercdarbībā"],
            ["name" => "Prakse uzņēmumā "],
            ["name" => "Praktiskās mācības"],
            ["name" => "Praktiskās mācības - apģērbu izgatavošanas tehnoloģija"],
            ["name" => "Praktiskās mācības - apmešana "],
            ["name" => "Praktiskās mācības  atslēdzniecībā"],
            ["name" => "Praktiskās mācības  atslēdznieku darbi"],
            ["name" => "Praktiskās mācības  biroja darbs"],
            ["name" => "Praktiskās mācības - Datorsistēmu uzbūve"],
            ["name" => "Praktiskās mācības - elektronika"],
            ["name" => "Praktiskās mācības - Elektrotehnikas un elektronikas pamati"],
            ["name" => "Praktiskās mācības - ēdienu gatavošana "],
            ["name" => "Paraktiskās mācības -frēzēšana"],
            ["name" => "Praktiskās mācības - friziera darbos"],
            ["name" => "Praktiskās mācības - ūsu, bārdas griešanas, ūsu skūšana"],
            ["name" => "Praktiskās mācības - flīzēšana, grīdu ieklāšana "],
            ["name" => "Praktiskās mācības - Galdniecības izstrādājumu konstrukcijas "],
            ["name" => "Praktiskās mācības - Grāmatvedība"],
            ["name" => "Praktiskās mācības - kokapstrādes tehnoloģija"],
            ["name" => "Praktiskās mācības - Koksnes aizsardzība un apstrāde"],
            ["name" => "Praktiskās mācības - konditorejas  izstrādājumu izgatavošana "],
            ["name" => "Praktiskās mācības - lodēšana"],
            ["name" => "Praktiskās mācības - Mācību birojs"],
            ["name" => "Praktiskās mācības - Mārketinga un reklāmas pakalpojumu"],
            ["name" => "Praktiskās mācības - Mārketinga un tirgus izpēte "],
            ["name" => "Praktiskās mācības - metināšana"],
            ["name" => "Praktiskās mācības - Projektu vadība "],
            ["name" => "Praktiskās mācības - Projektu vadība  un modernās tehnoloģijas "],
            ["name" => "Praktiskās mācības - sausās būves montāža"],
            ["name" => "Praktiskās mācības  uzņēmuma dibināšana un darbība"],
            ["name" => "Praktiskās mācības - Uzņēmuma dibināšana un darbības organizēšana "],
            ["name" => "Praktiskās mācības - viesnīcā - saimnieciskais dienests "],
            ["name" => "Praktiskās mācības - viesnīcā - viesu uzņemšanas dienests "],
            ["name" => "Praktiskās mācības - viesu apkalpošana"],
            ["name" => "Praktiskās mācības - virsbūves tehnika,remonts"],
            ["name" => "Praktiskās mācības- dekoratīvā krāsošana "],
            ["name" => "Praktiskās mācības elektromontāžā"],
            ["name" => "Praktiskās mācības- krāsošana un tapešu līmēšana "],
            ["name" => "Praktiskās mācības- motori"],
            ["name" => "Praktiskās mācības - gāzes sistēmas, ārējie gāzes tīkli"],
            ["name" => "Praktiskās mācības - siltumapgāde, sanitārtehnika"],
            ["name" => "Praktiskās mācības - vēdināšana, kondicionēšana"],
            ["name" => "Praktiskās mācības projektu  vadība un tehnoloģiju izmantošana "],
            ["name" => "Praktiskās mācības virpošanā"],
            ["name" => "Praktiskās mācības uzņēmumā "],
            ["name" => "Preču un pakalpojumu iepirkšana"],
            ["name" => "Preču un pakalpojumu izvēle elektromontāžas  darbiem"],
            ["name" => "Preču un pakalpojumu pārdošana"],
            ["name" => "Preču un pakalpojumu izvēle EKT infrastruktūras izveidei"],
            ["name" => "Preču un un pakalpojumu kustības norošināšana "],
            ["name" => "Preču uzskaite un dokumentēšana "],
            ["name" => "Preču zinības"],
            ["name" => "Prečzinības,sanitārija un higiēna"],
            ["name" => "Profesionālā saskarsme"],
            ["name" => "Profesionālā saskarsme un ētika"],
            ["name" => "Profesionālā ētika un etiķete"],
            ["name" => "alā ētoka un etiķete"],
            ["name" => "Profesionālās datorprogrammas"],
            ["name" => "Programmējamo loģisko kontrolleru peogrammēšanas un  regulēšnas tehnika"],
            ["name" => "Programmēšanas pamati"],
            ["name" => "Psiholoģija"],
            ["name" => "Rasēšana "],
            ["name" => "Rasēšanas pamati"],
            ["name" => "Rasējumu lasīšana"],
            ["name" => "Rasēšana un automatizētā projektēšana "],
            ["name" => "Rasēšana un skicēšana "],
            ["name" => "Reklāmas maketēšana un izstrādāšana "],
            ["name" => "Reklāmas servisa mācība"],
            ["name" => "Vīļu un mezglu  šūšanas parakse"],
            ["name" => "Reklāmas pakalpojumu organizēšana"],
            ["name" => "Remontu pamati"],
            ["name" => "Revīzija un kontrole"],
            ["name" => "Rokas metināšana MMA"],
            ["name" => "Sabiedrības un cilvēka drošība"],
            ["name" => "Sadales ietaišu izbūve"],
            ["name" => "Saimnieciskā dienesta darba organizācija"],
            ["name" => "Sanitārija un higiēna"],
            ["name" => "Sausās būves montāžas tehnoloģija"],
            ["name" => "Sociālās un pilsoniskās prasmes"],
            ["name" => "Spēka un apgaismes elektrotīklu ierīkošana "],
            ["name" => "Sports"],
            ["name" => "Statistika"],
            ["name" => "Stila mācība "],
            ["name" => "Stilu mācība"],
            ["name" => "Svešvaloda "],
            ["name" => "Svešvaloda profesijā "],
            ["name" => "Šūšanas darbu pamati"],
            ["name" => "Šūšanas izstrādājumu piegriešanas prakse"],
            ["name" => "Šūto izstrādājumu izgatavošana"],
            ["name" => "Šūto izstrādājumu konstruēšana un modelēšana"],
            ["name" => "Šūto iztrādājumu izgatavošana un laikošana"],
            ["name" => "Šūšanas un hidrotermiskās apstrādes aprīkojuma sagatavošana"],
            ["name" => "Tautsaimniecība"],
            ["name" => "Tāmes un normas"],
            ["name" => "Tehniskā grafika "],
            ["name" => "Tehniskā mehānika "],
            ["name" => "Tehniskās grafika"],
            ["name" => "Tehniskās grafikas pamati"],
            ["name" => "Tehniskie mērījumi"],
            ["name" => "Tehniskie mērījumi, pielaides un šēžas"],
            ["name" => "Telpu un vides sagatavošana viesu uzņemšanai"],
            ["name" => "Tekstilmateriālu sagatavošana"],
            ["name" => "Telpu un vides dizains"],
            ["name" => "Tērpu vēsture"],
            ["name" => "Tiešā pārdošana un klientu apkalpošana "],
            ["name" => "Tirgus izpēte"],
            ["name" => "Tirgus un klienti"],
            ["name" => "Tirgvedība"],
            ["name" => "Tirgzinības "],
            ["name" => "Tīmekļa tehnoloģijas "],
            ["name" => "Traktortehnikas vadīšana "],
            ["name" => "Transporta un loģistikas nozares uzņēmuma pamatprocesi"],
            ["name" => "Trešā profesionālā svešvaloda"],
            ["name" => "Trešā svešvaloda"],
            ["name" => "Tūrisma resursi un ģeogrāfija "],
            ["name" => "Tūrisma un viesmīlības uzņēmuma pamatprasmes un pamatprocesi"],
            ["name" => "Uzņēmejdrabība ēdināšanas uzņēmumos "],
            ["name" => "Uzņēmējdarbība konditorejas uzņēmumos, ražotnēs"],
            ["name" => "Uzņēmējdarbības pamati"],
            ["name" => "Uzņēmuma  mārketinga pasākumu kompleksa izstrāde"],
            ["name" => "Uzņēmuma darba organizācija"],
            ["name" => "Uzņēmuma darbības pamatprocesi"],
            ["name" => "Uzskaite un kalkulācija "],
            ["name" => "Uztura fizioloģija, sanitārija, higiēna"],
            ["name" => "Vadības grāmatvedība"],
            ["name" => "Valodas, kultūras  izpratne un izpausmes "],
            ["name" => "Vides mācība "],
            ["name" => "Virsbūves daļas remonta pamati"],
            ["name" => "Vienkāršu algoritmu izstrāde"],
            ["name" => "Viemīlības pamati"],
            ["name" => "Viesmīlības pamatprincipi tūrisma un viesmīlības uzņēmumā"],
            ["name" => "Viesmīlība"],
            ["name" => "Viesu apkalpošana, izmitināšanas un apkalpošanas mītnēs"],
            ["name" => "Viesu apkalpošana "],
            ["name" => "Viesu apkalpošanas organizācija "],
            ["name" => "Viesu uzņemšanas dienesta darba organizācija "],
            ["name" => "Vispārējā tautasaimniecības mācība "],
            ["name" => "Vispārējā tautasaimniecība"],
            ["name" => "Vizuālā koptēla veidošana "],
            ["name" => "Vizuālās reklāmas pamati"],
            ["name" => "Zaļās prasmes"],
            ["name" => "Zīmēšana un kompozicija"],
        ];

        DB::table('modules')->insert($modules);

    }
}