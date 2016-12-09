<?php
    include "Association.php";
    include "Address.php";
    include "SQLConnection.php";


    $arrayCodeThemes = array(
        "0"      => "Non connu",
        "001000" =>	"activités politiques",
        "001005" =>	"associations à caractère politique général",
        "001010" =>	"soutien et financement de partis et de campagnes électorales",
        "001015" =>	"action politique locale",
        "001020" =>	"action politique globale",
        "001025" =>	"activités citoyennes européennes",
        "002000" =>	"clubs, cercles de réflexion",
        "002005" =>	"associations philanthropiques",
        "002010" =>	"amicales laïques",
        "002015" =>	"clubs de réflexion",
        "002020" =>	"organisation de conférences",
        "003000" =>	"défense de droits fondamentaux, activités civiques",
        "003010" =>	"défense de la paix",
        "003012" =>	"défense des droits des enfants",
        "003015" =>	"défense des libertés publiques et des droits de l\'Homme",
        "003020" =>	"défense des droits des femmes, condition féminine",
        "003025" =>	"défense des droits des personnes homosexuelles",
        "003030" =>	"défense des droits des personnes en situation de handicap",
        "003035" =>	"association pour la défense de droits de minorités",
        "003040" =>	"lutte contre les discriminations",
        "003045" =>	"défense des droits des personnes rapatriées",
        "003050" =>	"défense des droits des personnes étrangères ou immigrées, de personnes réfugiées",
        "003060" =>	"activités civiques, information civique",
        "004000" =>	"justice",
        "004010" =>	"médiation, prévention",
        "004020" =>	"contrôle judiciaire, associations de personnels de justice",
        "004025" =>	"accès aux droits dans les tribunaux, assistance juridique",
        "004030" =>	"défense des droits des victimes",
        "004035" =>	"maisons du droit, accès au droit",
        "005000" =>	"information communication",
        "005005" =>	"presse, édition",
        "005010" =>	"radios privées",
        "005015" =>	"audiovisuel",
        "005020" =>	"réseaux internet",
        "005025" =>	"autres supports de communication",
        "005030"=>	"auditeurs, consommateurs d\'outils d\'information et de communication",
        "005035"=>	"professionnels de l\'information et de communication",
        "006000" =>	"culture, pratiques d\'activités artistiques, culturelles",
        "006005" =>	"bibliothèques, ludothèques, discothèques, vidéothèques",
        "006010" =>	"expression écrite, littérature, poésie",
        "006020" =>	"arts graphiques, bande dessinée, peinture, sculpture, architecture",
        "006025" =>	"photographie, cinéma (dont ciné-clubs)",
        "006030" =>	"chant choral, musique",
        "006040" =>	"danse",
        "006045" =>	"folklore",
        "006070" =>	"théâtre, marionnettes, cirque, spectacles de variété",
        "006090" =>	"artisanat, travaux manuels, bricolage, expositions",
        "006100" =>	"promotion de l\'art et des artistes",
        "006105"=>	"loisirs scientifiques et techniques",
        "006110"=>	"langues, dialectes, patois",
        "006115"=>	"arts de la rue",
        "007000" =>	"clubs de loisirs, relations",
        "007002"=>	"aéroclubs",
        "007003"=>	"modélisme",
        "007005" =>	"bridge, jeux de cartes, échecs, dames, jeux de société...",
        "007010" =>	"billard, quilles",
        "007025" =>	"clubs de collectionneurs (hors sauvegarde, entretien du patrimoine), philatélie, numismatique",
        "007030" =>	"collectionneurs de véhicules, clubs amateurs de voitures anciennes",
        "007035" =>	"cercles privés, fan-clubs",
        "007040"=>	"activités festives (soirées…)",
        "007045" =>	"élevage canin, clubs de chiens de défense",
        "007050" =>	"animaux familiers, colombophilie, aquariophilie",
        "007060" =>	"gastronomie, oenologie, confréries, gourmets",
        "007070" =>	"jardins ouvriers, floralies",
        "007075" =>	"échanges locaux, réseaux d\'échanges",
        "007080" =>	"centres de loisirs, clubs de loisirs multiples",
        "007085"=>	"relaxation, sophrologie",
        "007095"=>	"radioamateurs",
        "009000" =>	"action socio-culturelle",
        "009005" =>	"maisons de jeunes, foyers, clubs de jeunes",
        "009007" =>	"maisons de la culture, office municipal, centres culturels",
        "009010" =>	"loisirs pour personnes en situation de handicap",
        "009015" =>	"associations socio-éducatives, scoutisme",
        "009020" =>	"centres aérés, colonies de vacances",
        "009025" =>	"mouvements éducatifs de jeunesse et d\'éducation populaire",
        "009030" =>	"comités des fêtes",
        "009035" =>	"foyers ruraux",
        "009040" =>	"clubs du troisième âge",
        "009045" =>	"majorettes, twirlings, carnavals, défilés",
        "009050" =>	"jumelages, échanges culturels, organisation d\'échanges linguistiques, échanges culturels au plan international",
        "010000" =>	"préservation du patrimoine",
        "010005" =>	"collections d\'objets, de documents, bibliothèques spécialisées pour la sauvegarde et l\'entretien du patrimoine",
        "010010" =>	"musées, collections historiques",
        "010015" =>	"associations, sociétés savantes pour des études historiques, histoire du patrimoine",
        "010017" =>	"sociétés, clubs de généalogie",
        "010020" =>	"commémorations, entretien de monuments et sites historiques, souvenir militaire",
        "010022" =>	"comités de défense du patrimoine",
        "010030" =>	"construction de monuments (sauf lieux de culte)", 
        "011000" =>	"Sports, activités de plein air",
        "011004"=>	"arbitrage",
        "011005" =>	"associations multisports locales",
        "011010" =>	"associations multisports scolaires ou universitaires", 
        "011015" =>	"associations multisports d\'entreprise",
        "011018" =>	"handisport",
        "011020" =>	"Athlétisme (triathlon, pentathlon, footing, jogging)",
        "011025" =>	"Aviron, canoë kayak (aviron, rafting, canoë kayak, joutes)",
        "011030" =>	"Badminton (badminton, squash, pelote basque)",
        "011035" =>	"Boules (pétanque, boules)",
        "011040" =>	"Bowling",
        "011045" =>	"Danse sportive (danse sportive, hip hop, claquettes)",
        "011050" =>	"Equitation (équitation, hippisme, course camarguaise, landaise)",
        "011055" =>	"Escalade, montagne (escalade, spéléologie, via ferrata, canyonisme, alpinisme",
        "011060" =>	"Escrime",
        "011065" =>	"Basket-ball",
        "011070" =>	"Handball",
        "011075" =>	"Football (football, futsal)",
        "011080" =>	"Rugby (rugby à 13, à 15)",
        "011085" =>	"Volley ball (volley, beach volley)",
        "011090" =>	"Autres sports collectifs (baseball, hockey sur glace, football américain)",
        "011092" =>	"hockey sur glace, sports de glace",
        "011095" =>	"nautisme, glisse sur eau (ski nautique, surf, char à voile)",
        "011100" =>	"Golf",
        "011105" =>	"Gymnastique (gymnastique, gymnastique d\'entretien, éducation physique, yoga), aérobic",
        "011110" =>	"Haltérophilie",
        "011115" =>	"Marche sportive (randonnée pédestre, raid, trekking, course orientation)",
        "011120" =>	"Musculation (culturisme, musculation)",
        "011125" =>	"Natation - Baignade (natation, plongée)",
        "011130" =>	"Roller, skate",
        "011135" =>	"Sports aériens (avion, planeur, ULM, parachutisme)",
        "011140" =>	"Judo",
        "011145" =>	"Sports de combat (boxe, kick box, boxe thaï, lutte)",
        "011150" =>	"Autres arts martiaux (karaté, aïkido, taekwondo)",
        "011155" =>	"Sports de neige (ski alpin, ski de fond, snowboard) , montagne",
        "011160" =>	"Sports mécaniques (sport automobile, moto, trial)",
        "011165" =>	"Tennis (tennis, longue paume)",
        "011170" =>	"Tennis de table (tennis de table, ping-pong)",
        "011175" =>	"Tir (tir à l\'arc, tir à balle, ball trap), javelot",
        "011180" =>	"Cyclisme (cyclisme, vélo, VTT, y c course d\'orientation à vélo, cyclotourisme)",
        "011185" =>	"Voile (voile, dériveur, planche à voile)",
        "011190" =>	"gestion d\'équipements sportifs, organisation de rencontres sportives, organisation de championnats, clubs de supporters",
        "011192" =>	"associations pour la promotion du sport, médailles, mérite sportif",
        "011400" =>	"activités de plein air (dont saut à l\'élastique)",
        "013000" =>	"chasse pêche",
        "013005" =>	"chasse",
        "013010" =>	"pêche",
        "014000" =>	"amicales, groupements affinitaires, groupements d\'entraide (hors défense de droits fondamentaux",
        "014025" =>	"organisation de professions (hors caractère syndical)",
        "014030" =>	"association du personnel d\'une entreprise (hors caractère syndical)",
        "014035" =>	"groupements d\'entraide et de solidarité",
        "014040" =>	"amicale de personnes originaires d\'un même pays (hors défense des droits des étrangers)",
        "014045" =>	"amicale de personnes originaires d\'une même région",
        "014050" =>	"associations féminines pour l\'entraide et la solidarité (hors défense de droits fondamentaux)",
        "014060" =>	"associations de personnes homosexuelles pour l\'entraide et la solidarité (hors défense de droits fondamentaux)",
        "014070" =>	"associations de personnes en situation de handicap pour l\'entraide et la solidarité (hors défense de droits fondamentaux)",
        "014080" =>	"associations de classe d\'âge",
        "015000" =>	"éducation formation ",
        "015005" =>	"parents d\'élèves",
        "015010" =>	"organisation de professions enseignantes, amicales de personnel",
        "015025" =>	"associations périscolaires, coopération, aide à l\'enseignement",
        "015030" =>	"œuvres sociales en faveur des élèves, œuvres en faveur pupilles de la nation",
        "015035" =>	"organisme de gestion d\'établissement d\'enseignement général et technique",
        "015040" =>	"organisme de gestion d\'établissement d\'enseignement supérieur",
        "015045" =>	"établissement de formation professionnelle, formation continue",
        "015050"=>	"centre d\'enseignement et de formation",
        "015065" =>	"associations d\'étudiants, d\'élèves",
        "015070" =>	"amicales, associations d\'anciens étudiants, d\'anciens élèves",
        "015075" =>	"amicales, personnel d\'établissements scolaires ou universitaires",
        "015085" =>	"organisation, financement de voyages d\'études, d\'échanges, pour scolaires ou universitaires",
        "015087" =>	"études et formations linguistiques",
        "015090" =>	"promotion de titres, de diplômes",
        "015100" =>	"apprentissage",
        "015105"=>	"maisons familiales rurales",
        "016000" =>	"recherche",
        "016005" =>	"recherche sur l\'éducation et la formation",
        "016010" =>	"recherche sur la culture",
        "016015" =>	"recherche sur la vie sociale et politique",
        "016025"=>	"recherche sur l\'environnement et le climat",
        "016030" =>	"association de recherches scientifiques, sciences physiques, sciences humaines…",
        "016050" =>	"autres associations de recherche",
        "016080" =>	"diffusion de savoirs, sociétés savantes ou académiques",
        "017000" =>	"santé",
        "017005" =>	"cliniques, centres médicaux, hôpitaux, sanatoriums, établissements de rééducation, maisons de convalescence",
        "017015" =>	"hôpitaux psychiatriques, soins ambulatoires en santé mentale",
        "017020" =>	"dispensaires, soins infirmiers, services paramédicaux, de garde",
        "017025" =>	"services médicaux d\'urgence",
        "017045" =>	"centres de réadaptation",
        "017055" =>	"accompagnement, aide aux malades",
        "017065" =>	"don de sang, d\'organes",
        "017075" =>	"gestion de matériel médical",
        "017085" =>	"hygiène, diététique",
        "017095" =>	"accueil, information pour contraception et avortement",
        "017105" =>	"médecine du travail",
        "017115" =>	"prévention et dépistage du sida",
        "017120" =>	"éducation sanitaire, prévention générale",
        "017125" =>	"prévention et dépistage de maladies (autres que le sida)",
        "017130" =>	"associations de personnes malades, ou anciens malades",
        "017135" =>	"homéopathie, médecines douces",
        "017145" =>	"organisation de professions médicales ou paramédicales",
        "017155" =>	"organisation de congrès médicaux",
        "017200" =>	"recherche médicale",
        "017210" =>	"financement de la recherche médicale",
        "017300" =>	"médecine animale, vétérinaire",
        "018000" =>	"services et établissements médico-sociaux",
        "018005" =>	"accueil et protection de la petite enfance",
        "018010" =>	"établissements et services pour adolescents en difficulté",
        "018015" =>	"établissements, services pour personnes handicapées (y c C.A.T)",
        "018025" =>	"établissements et services pour adultes en difficulté, CHRS  (centres d’hébergement et de réadaptation sociale)",
        "018030" =>	"prévention et lutte contre l’alcoolisme, la toxicomaniev",
        "018040" =>	"aide aux accidentés du travail",
        "018045" =>	"aide aux victimes de maladies professionnelles",
        "018050" =>	"aide sociale aux personnes en situation de handicap",
        "019000" =>	"interventions sociales",
        "019004" =>	"aide et conseils aux familles",
        "019005" =>	"associations familiales, services sociaux pour les familles",
        "019010" =>	"centres sociaux et socioculturels, foyers de jeunes travailleurs, centres d\'études et d\'action sociale",
        "019012" =>	"lutte contre le surendettement",
        "019014" =>	"lutte contre l\'illettrisme",
        "019016" =>	"aide à l\'insertion des jeunes",
        "019020" =>	"groupements de chômeurs, aide aux chômeurs",
        "019025" =>	"aide aux réfugiés et aux immigrés (hors droits fondamentaux)",
        "019030" =>	"aide aux victimes de calamités, de catastrophes naturelles",
        "019032" =>	"aide aux victimes de violences conjugales",
        "019035" =>	"aide aux victimes de violences faites aux enfants",
        "019040" =>	"aide aux personnes en danger, solitude, désespoir, soutien psychologique et moral",
        "019042" =>	"lutte contre la violence routière",
        "019045" =>	"lutte contre diverses formes de violence",
        "019047" =>	"foyers socio-éducatifs",
        "019050" =>	"réinsertion des délinquants",
        "019055" =>	"soutien, reclassement des détenus",
        "020000" =>	"associations caritatives, humanitaires, aide au développement, développement du bénévolat",
        "020005" =>	"secours financiers et autres services aux personnes en difficulté",
        "020010" =>	"secours en nature, distribution de nourriture et de vêtements",
        "020015" =>	"associations caritatives à buts multiples",
        "020020" =>	"associations caritatives intervenant au plan international",
        "020025" =>	"développement du bénévolat",
        "021000" =>	"services familiaux, services aux personnes âgées",
        "021005" =>	"crèches, garderies, haltes garderies",
        "021010" =>	"aide à domicile",
        "021015" =>	"services aux personnes âgées (téléalarme...)",
        "021020" =>	"foyers pour personnes âgées, maisons de retraite,  maisons de retraite médicalisées",
        "022000" =>	"conduite d\'activités économiques",
        "022510" =>	"cantines, restaurants d\'entreprises",
        "022515" =>	"centres de gestion, centres juridiques, audits",
        "022520" =>	"gestion financière, gestion immobilière",
        "022525" =>	"études techniques",
        "022530" =>	"groupement d\'achats, groupement d\'entreprises",
        "022535" =>	"amicales de commerçants, organisation de foires",
        "022540" =>	"chambres de commerce, chambres économiques",
        "022542" =>	"association à but commercial, développement économique",
        "022543" =>	"transports",
        "022545" =>	"caisses de retraite, de prévoyance, de pensions",
        "022550" =>	"caisses de congés payés, caisses de secours",
        "023000" =>	"représentation, promotion et défense d\'intérêts économiques",
        "023001" =>	"usagers de services publics",
        "023002" =>	"mouvements de consommateurs",
        "023003" =>	"défense des contribuables",
        "023004" =>	"actionnaires, épargnants",
        "023005" =>	"groupements de salariés à caractère syndical",
        "023007" =>	"groupements professionnels",
        "023010" =>	"associations de défense d\'intérêts des retraités ou des personnes âgées",
        "023020" =>	"associations d\'exploitants agricoles, élevage, horticulture, aviculture, apiculture, viticulture, viniculture ",
        "023022" =>	"associations d\'intérêts maritimes, marins",
        "023025" =>	"associations pour la représentation d\'artisans, de commerçants",
        "023030" =>	"unions patronales",
        "023035" =>	"association de représentation de professions libérales",
        "023040" =>	"représentation d\'intérêts économiques sectoriels",
        "023045" =>	"représentation d\'intérêts régionaux et locaux",
        "024000" =>	"Environnement, cadre de vie",
        "024005" =>	"pollutions, assainissement",
        "024010" =>	"ressources naturelles",
        "024015" =>	"espaces naturels",
        "024020" =>	"protection de sites naturels",
        "024025" =>	"préservation de la faune sauvage",
        "024026" =>	"protection des animaux",
        "024030" =>	"préservation de la flore sauvage",
        "024035" =>	"comités de défense, de sauvegarde",
        "024040" =>	"mouvements écologiques",
        "024045" =>	"défense et amélioration du cadre de vie",
        "024050" =>	"actions de sensibilisation et d\'éducation à l\'environnement et au développement durable",
        "030000" =>	"aide à l\'emploi, développement local, promotion de solidarités économiques, vie locale",
        "030005" =>	"Comité, défense d\'un emploi",
        "030010" =>	"entreprises d\'insertion, associations intermédiaires, régies de quartier",
        "030012" =>	"comités de défense et d\'animation de quartier, association locale ou municipale",
        "030015" =>	"groupement d\'employeurs",
        "030020" =>	"aide à la création d\'activités économiques individuelles",
        "030050" =>	"promotion d\'initiatives de développement durable",
        "032000" =>	"logement",
        "032510" =>	"aide au logement",
        "032520" =>	"associations et comités de locataires, de propriétaires, comités de logement",
        "032525" =>	"réhabilitation et construction de logements",
        "034000" =>	"Tourisme",
        "034210" =>	"auberges de jeunesse, organisation de voyages",
        "034220" =>	"maisons et villages de vacances",
        "034230" =>	"gîtes ruraux, camping, caravaning, naturisme",
        "034240" =>	"syndicats d\'initiative, offices de tourisme, salons du tourisme",
        "036000" =>	"sécurité, protection civile",
        "036510" =>	"amicale de sapeurs pompiers",
        "036520" =>	"sauvetage, secourisme, protection civile",
        "036530" =>	"prévention, formation, cours de secourisme",
        "036535" =>	"sécurité routière",
        "036540" =>	"sauvetage en mer",
        "036545" =>	"sécurité et sauvetage en montagne",
        "038000" =>	"armée (dont préparation militaire, médailles)",
        "038105" =>	"anciens combattants",
        "038110" =>	"associations de militaires, amicales, associations de conscrits",
        "040000" =>	"activités religieuses, spirituelles ou philosophiques",
        "050000" =>	"domaines divers, domaines de nomenclature SITADELE à reclasser"
    );

    //Récupère les informations
    function parseXMLfile($xmlfile, $arrayAssociations){
        try{
            $parution_jo =  new SimpleXMLElement($xmlfile, 0, true);
            libxml_use_internal_errors(true);
            if ($parution_jo === false) {
                echo "Erreur lors du chargement du XML\n";
                foreach(libxml_get_errors() as $error) {
                    echo "\t", $error->message;
                }
                return $arrayAssociations;
            }
            else {
                foreach ($parution_jo->ANNONCE_REF as $association) {
                    $code = (int)$association->TYPE['code'];
                    if ($code == 1) {
                        $name = (String)$association->TITRE;
                        if ($association->IDASSOC)
                            $idAssociation = (String)$association->IDASSOC;
                        else
                            $idAssociation = (String)$association['datedeclaration'];//à confirmer
                        $theme = "";
                        foreach ($association->THEMES->THEME as $themes) {
                            if($theme != ""){
                                $theme = $theme.", ";
                            }
                            $theme = ((String)$theme).getTheme($themes['code']);
                        }
                        if($association->SIEGE_SOCIAL)
                          $address = new Address((String)$association->SIEGE_SOCIAL);
                        else
                            $address = new Address((String)$association['cp']);
                        if($association->OBJET  || $association['datedeclaration'] )
                            $description = ((String) $association->OBJET)."; Date de déclaration : ".$association['datedeclaration'];
                        $a = new Association($name, $idAssociation, $address, $description, $theme);
                        array_push($arrayAssociations, $a);
                        return $arrayAssociations;
                    }
                    else{
                        return $arrayAssociations;
                    }/*else if ($code == 2 || $code = 11 || 22) {
                        $name = (String) $association->TITRE;
                        if ($name == "")
                            $name = (String) $association->ANCIEN_TITRE;
                        $existAsso = existAssociation($name, $arrayAssociations);
                        if ($existAsso instanceof Association) {
                            if ((String)$association->NOUVEAU_TITRE != "") {
                                $existAsso->setName((String)$association->NOUVEAU_TITRE);
                            }
                            if ((String)$association->NOUVEL_OBJET != "") {
                                $existAsso->setDescription((String)$association->NOUVEL_OBJET);
                            }
                            if ((String)$association->ADDITIF_OBJET != "") {
                                $existAsso->addDescription((String)$association->ADDITIF_OBJET);
                            }
                        } else {
                            $name = (String)$association->TITRE;
                            if ($name == "") {
                                $name = (String)$association->NOUVEAU_TITRE;
                            }
                            if ((String)$association->IDASSOC)
                                $idAssociation = (String)$association->IDASSOC;
                            else
                                $idAssociation = (String)$association['datedeclaration'];//à confirmer
                            $theme = "";
                            foreach ($association->THEMES->THEME as $themes) {
                                if($theme != ""){
                                    $theme = $theme.", ";
                                }
                                $theme = $theme.getTheme($themes['code']);
                            }
                            if($association->SIEGE_SOCIAL)
                                $address = new Address((String)$association->SIEGE_SOCIAL);
                            $description = "";
                            if ((String)$association->NOUVEL_OBJET != "")
                                $description = (String)$association->NOUVEL_OBJET;
                                $description = $description."; Date de déclaration : ".$association['datedeclaration'];
                            if ((String)$association->ADDITIF_OBJET != "") {
                                $description = (String)$description.", ".((String)$association->ADDITIF_OBJET);
                            }
                            $a = new Association($name, $idAssociation, $address, $description, $theme);
                            array_push($arrayAssociations, $a);
                            return $arrayAssociations;
                        }
                    } else if ($code == 3 || $code == 111) {
                        $name = (String)$association->TITRE;
                        if(existAsso($name, $arrayAssociations)){
                            deleteAssociation($name, $arrayAssociations);
                        }
                    }*/
                }
            }
        }
        catch (Exception $e){
            echo 'Please try again later...';
            return $arrayAssociations;
        }
        return $arrayAssociations;
    }

    //Vérifie si une association a déjà été déclaré.
    function existAssociation($name, $arrayAssociations){
        foreach( $arrayAssociations as $association){
            if($association instanceof Association) {
                if ($association->getName() == $name) {
                    return $association;
                }
            }
        }
        return false;
    }

    //Supprime une association du tableau
    function deleteAssociation($name, $arrayAssociations){
        $index = 0;
        foreach( $arrayAssociations as $association){
            if($association instanceof Association) {
                if ($association->getName() == $name) {
                    unset($index, $arrayAssociations);
                }
            }
            $index++;
        }
    }

    //Récupère le thème correspondant au code
    function getTheme($code){
        $stringCode = (String) $code;
        global $arrayCodeThemes;
        if(array_key_exists($stringCode, $arrayCodeThemes))
          return  $arrayCodeThemes[$stringCode];
        else
            return "Non connu";
    }

/**
 *
 */
function importCategory(){
    global $arrayCodeThemes;
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sea";
    $sqlCo = new SQLConnection($servername, $username, $password, $dbname);

    $sqlCo->sqlConnect();
        foreach($arrayCodeThemes as $category){
        $sql = "INSERT INTO category (name) VALUES ('".$category."')";

        $sqlCo->sqlQuery($sql);
    }
}

function importData($arrayAssociations){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sea";
    $sqlCo = new SQLConnection($servername, $username, $password, $dbname);

    $sqlCo->sqlConnect();

    foreach($arrayAssociations as $association) {
        if($association instanceof Association) {
            $address = $association->getAddress();
            if($address instanceof Address){
                $street = $address->getStreet();
                $street = str_ireplace('\'', "\\'", $street);
                $city = $address->getCity();
                $zipcode = $address->getZipcode();
                $sqlAddress = "INSERT INTO address (street, zipcode, city)
                 VALUES ('".$street."','".$zipcode."','".$city."')";

                $sqlCo->sqlQuery($sqlAddress);
                $idAddress = $sqlCo->getLastIdInsert();
            }
            $name = $association->getName();
            $name = str_ireplace('\'', "\\'", $name);
            $idAssoc = $association->getIdAssociation();
            $description = $association->getDescription();
            $description = str_ireplace('\'', "\\'", $description);
            $theme = $association->getTheme();
            echo "theme:".$theme."\n";
            $sqlTheme = "SELECT * FROM category where name = '".$theme."'";
            $idtheme = $sqlCo->selectQuery($sqlTheme);

            $sql = "INSERT INTO association (address, category, name, oJIdentifier, description, validate)
                 VALUES (".$idAddress.", ".$idtheme[0].",'".$name."','".$idAssoc."','".$description."', 1)";

            $sqlCo->sqlQuery($sql);
        }
    }
    $sqlCo->sqlDisconnect();
}

importCategory();
$dir = "./fileXML";
    $files = scandir($dir, 1);
    array_pop($files);
    array_pop($files);
    $files = array_reverse($files );
    $arrayAssociations = array();
    foreach($files as $xmlfile){
        $arrayAssociations = parseXMLfile($dir."/".$xmlfile, $arrayAssociations);
    }
    importData($arrayAssociations);






?>