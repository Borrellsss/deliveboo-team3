<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Product;

class PresentationProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        // cinese
        $products_dimsum = [
            [
                'name' => 'Pollo alle mandorle',
                'description' => 'Pollo alle mandorle in stile Guangdong, con germogli di bambù e mandorle tostate',
                'ingredients' => 'Pollo, fecola di patate, pepe bianco, albume, germogli di bambù, germogli di bambù e salsa di soia',
                'cooking_time' => 16,
                'price' => 10
            ],
            [
                'name' => 'Anatra alla Pechinese',
                'description' => 'Anatra laccata al miele nel metodo tradizionale cinese',
                'ingredients' => 'Anatra, cipollotti, vino di riso, miele, arancia, sale, zenzero, peperoncini piccanti',
                'cooking_time' => 20,
                'price' => 19
            ],
            [
                'name' => 'Spaghetti con i frutti di mare',
                'description' => 'Spaghetti alla piastra con frutti di mare freschi e verdure',
                'ingredients' => 'Spaghetti di riso, cozze, vongole, gamberetti, moscardini, totanini, pomodori ciliegio, peperoncino',
                'cooking_time' => 15,
                'price' => 16
            ],
            [
                'name' => 'Nuvole di drago',
                'description' => 'Nuvole di drago croccanti con salsa teriaki',
                'ingredients' => 'Farina di tapioca, gamberetti, sale, olio di arachidi',
                'cooking_time' => 5,
                'price' => 6
            ],
            [
                'name' => 'Baozi',
                'description' => 'Panini al vapore ripieni di carne e verdure',
                'ingredients' => 'Farina di frumento, acqua, lievito, zucchero, carne di maiale, cavolo cinese, cipollotto, zenzero, olio di sesamo, salsa di soia, pepe nero',
                'cooking_time' => 17,
                'price' => 11
            ],
        ];

        foreach($products_dimsum as $product_dimsum) {
            $product_dimsum = new Product();
            $product_dimsum->name = $product_dimsum['name'];
            $product_dimsum->cover = null;
            $product_dimsum->description = $product_dimsum['description'];
            $product_dimsum->ingredients = $product_dimsum['ingredients'];
            $product_dimsum->cooking_time = $product_dimsum['cooking_time'];
            $product_dimsum->price = $product_dimsum['price'];
            $product_dimsum->visible = rand(0, 1);
            $product_dimsum->user_id = 16;
            $product_dimsum->save();
        }

        $products_wangjao = [
            [
                'name' => 'Involtini Primavera',
                'description' => 'Bastoncini di carta di riso fritti ripieni di cavolo cappuccio, carote e cipollotti',
                'ingredients' => 'Carta di riso, cavolo cappuccio, cipollotti, carote, sale, pepe, olio, salsa di soia',
                'cooking_time' => 8,
                'price' => 6
            ],
            [
                'name' => 'Gnocchi di riso alle verdure',
                'description' => 'Gnocchi di riso saltati con funghi, zucchine e carote  in agrodolce',
                'ingredients' => 'Farina di riso, acqua, sale, aceto di riso, zucchero, funghi shitake, zucchine, carote',
                'cooking_time' => 12,
                'price' => 10
            ],
            [
                'name' => 'Gelato fritto',
                'description' => 'Gelato alla crema in pastella fritto',
                'ingredients' => 'Gelato alla crema, farina 00, acqua, olio, zucchero, pan di Spagna',
                'cooking_time' => 8,
                'price' => 5
            ],
            [
                'name' => 'Pollo con bambù e funghi shitake',
                'description' => 'Pollo con germogli di bambù e funghi shitake sfumato con salsa tamari',
                'ingredients' => 'Pollo, germogli di bambù, funghi shitake, porro, olio, sale, zenzero, brodo vegetale, salsa tamari',
                'cooking_time' => 11,
                'price' => 9
            ],
            [
                'name' => 'Jiaozi',
                'description' => 'Ravioli cinesi ripieni di carne cotti al vapore',
                'ingredients' => 'Farina 00, acqua, sale, carne di maiale, cavolo cappuccio, cipollato, salsa di soia, pepe',
                'cooking_time' => 13,
                'price' => 10
            ],
            [
                'name' => 'Melanzane al sapore Yuxiang (al profumo di pesce)',
                'description' => 'Melanzane cinesi stufate con carne di maiale, salsa Doubanjiang, porro e olio di sesamo e menta',
                'ingredients' => 'Melanzane, carne di maiale, salsa Doubanjiang, porro, sale, olio di sesamo, menta',
                'cooking_time' => 11,
                'price' => 9
            ],
        ];

        foreach($products_wangjao as $product_wangjao) {
            $product_wangjao = new Product();
            $product_wangjao->name = $product_wangjao['name'];
            $product_wangjao->cover = null;
            $product_wangjao->description = $product_wangjao['description'];
            $product_wangjao->ingredients = $product_wangjao['ingredients'];
            $product_wangjao->cooking_time = $product_wangjao['cooking_time'];
            $product_wangjao->price = $product_wangjao['price'];
            $product_wangjao->visible = rand(0, 1);
            $product_wangjao->user_id = 17;
            $product_wangjao->save();
        }

        ////////////////////////////////////////////////////////////////////

        // giapponese
        $products_kensho = [
            [
                'name' => 'Sashimi assortito',
                'description' => 'Sashimi di salmone, polpo, sgombro, gamberi, ventresca, tonno pinna gialla',
                'ingredients' => 'Riso, aceto di riso, salmone, polpo, sgombro, gamberi, ventresca, tonno pinna gialla, wasabi',
                'cooking_time' => 15,
                'price' => 20
            ],
            [
                'name' => 'Takoyaki',
                'description' => 'Polpettine di polpo condite con maionese e katsuobushi',
                'ingredients' => 'Farina 00, uova, brodo dassi, polpo, Benishouga, cipollotti, maionese, katsuobushi',
                'cooking_time' => 18,
                'price' => 26
            ],
            [
                'name' => 'Gamberoni in tempura',
                'description' => 'Gamberoni fritti in pastella di farina',
                'ingredients' => 'Gamberoni, farina 00, olio di arachidi',
                'cooking_time' => 8,
                'price' => 5
            ],
            [
                'name' => 'Toshikoshi Soba',
                'description' => 'Zuppa tradizionale con soba noodles',
                'ingredients' => 'Farina  00, alga Kombu, alga Wakame, Mirin, Usukuchi Shoyu, kamaboko, cipolotti, shichimi togarashi, gamberi tigre, rapa',
                'cooking_time' => 11,
                'price' => 9
            ],
            [
                'name' => 'Okonomiyaki',
                'description' => 'Frittelle agrodolce di cavolo verza con gamberi e pancetta con salsa teriaki, maionese e katsuobushi',
                'ingredients' => 'Farina 00, acqua, sale, maionese, katsuobushi cavolo verza, gamberi, pancetta, uova, salsa teriaki',
                'cooking_time' => 12,
                'price' => 8
            ],
            [
                'name' => 'Ramen Keinsho',
                'description' => 'Zuppa a base di spaghetti di frumento  servita in brodo di pesce, con miso, maiale affettato, alga nori, kamaboko, negi e mais',
                'ingredients' => 'Farina di frumento, brodo di pesce, miso, alga nori, kamaboko, negi, mais e carne di maiale',
                'cooking_time' => 8,
                'price' => 13
            ],
        ];

        foreach($products_kensho as $product_kensho) {
            $product_kensho = new Product();
            $product_kensho->name = $product_kensho['name'];
            $product_kensho->cover = null;
            $product_kensho->description = $product_kensho['description'];
            $product_kensho->ingredients = $product_kensho['ingredients'];
            $product_kensho->cooking_time = $product_kensho['cooking_time'];
            $product_kensho->price = $product_kensho['price'];
            $product_kensho->visible = rand(0, 1);
            $product_kensho->user_id = 18;
            $product_kensho->save();
        }

        $products_teikit = [
            [
                'name' => 'Chicken Tijuana',
                'description' => 'Roll di pollo fritto, avocado e ravanello  con maionese al curry e cipolle fritte croccanti',
                'ingredients' => 'Riso, alga nori, aceto di vino, pollo, avocado, ravanello, maionese, sale, curry, olio evo cipolle',
                'cooking_time' => 15,
                'price' => 14.50
            ],
            [
                'name' => 'NIkke Poke',
                'description' => 'Poke con soia edamame, avocado, cavolo viola, riso, tonno crudo',
                'ingredients' => 'soia edamame, avocado, cavolo viola, riso, tonno crudo salsa di soia',
                'cooking_time' => 10,
                'price' => 11.70
            ],
            [
                'name' => 'Pork Bao Buns',
                'description' => 'Bao ripieni di pulled pork alla salsa hoisin',
                'ingredients' => 'Farina 00, acqua, zucchero, lievito di birra secco, latte, sale, salsa hoisin, salsa di soia, coriandolo, cetrioli. Arachidi. Cavolo viola, peperoncino, pulled pork',
                'cooking_time' => 10,
                'price' => 14
            ],
            [
                'name' => 'Crunchy Tuna',
                'description' => 'Uramaki di tonno pinna gialla, avocado, Philadelphia e julienne di carote croccanti',
                'ingredients' => 'Riso, alga nori, aceto di vino, tonno, avocado, Philadelphia e carote',
                'cooking_time' => 10,
                'price' => 18
            ],
            [
                'name' => 'Roll Kioto',
                'description' => 'Uramaki di avocado, cipolle in agrodolce, cetriolo e salmone',
                'ingredients' => 'Riso, alga nori, aceto di vino, avocado, cipolle in agrodolce, cetriolo e salmone',
                'cooking_time' => 10,
                'price' => 14
            ],
            [
                'name' => 'Salmon Crush',
                'description' => 'Uramaki di Salmone fritto, con riduzione di aceto balsamico e salmone in due consistenze',
                'ingredients' => 'Riso, alga nori, aceto di vino, salmone, aceto balsamico, coriandolo',
                'cooking_time' => 10,
                'price' => 14
            ],
        ];

        foreach($products_teikit as $product_teikit) {
            $product_teikit = new Product();
            $product_teikit->name = $product_teikit['name'];
            $product_teikit->cover = null;
            $product_teikit->description = $product_teikit['description'];
            $product_teikit->ingredients = $product_teikit['ingredients'];
            $product_teikit->cooking_time = $product_teikit['cooking_time'];
            $product_teikit->price = $product_teikit['price'];
            $product_teikit->visible = rand(0, 1);
            $product_teikit->user_id = 19;
            $product_teikit->save();
        }

        ////////////////////////////////////////////////////////////////////

        // hamburgeria
        $products_hundred = [
            [
                'name' => 'Satisfation',
                'description' => '2x 110 grammi di hamburger stagionato, doppio cheddar, doppio bacon e maionese affumicata',
                'ingredients' => 'Panino di farina 00 al burro, burger di carne bovina, formaggio cheddar, bacon, maionese affumicata',
                'cooking_time' => 20,
                'price' => 15
            ],
            [
                'name' => 'Showdown',
                'description' => '2x 110 grammi di hamburger stagionato, cheddar, burro di arachidi al caramello e salsa barbecue',
                'ingredients' => 'Panino di farina 00 al burro, burger di carne bovina, formaggio cheddar, burro di arachidi al caramello e salsa barbecue',
                'cooking_time' => 8,
                'price' => 12
            ],
            [
                'name' => 'Animal Style',
                'description' => '2x 110 grammi di hamburger stagionato, cheddar, pulled pork, cipolla rosa caramellata, salsa barbecue',
                'ingredients' => 'Panino di farina 00 al burro, burger di carne bovina, formaggio cheddar, pulled pork, cipolla rosa, zucchero e salsa barbecue',
                'cooking_time' => 10,
                'price' => 14
            ],
            [
                'name' => 'Singular',
                'description' => '2x 110 grammi di hamburger stagionato, cheddar, salsa barbecue, cipolla caramellata e crema di camembert',
                'ingredients' => 'Panino di farina 00 al burro, burger di carne bovina, cheddar, salsa barbecue, cipolla caramellata e crema di camembert',
                'cooking_time' => 10,
                'price' => 13
            ],
            [
                'name' => 'Ari Oro',
                'description' => '2x 110 grammi di hamburger stagionato, cheddar, iceberg, pomodoro, cipollotto, sottaceti e maionese',
                'ingredients' => 'Panino di farina 00 al burro, burger di carne bovina, cheddar, iceberg, pomodoro, cipollotto, sottaceti e maionese salsa barbecue',
                'cooking_time' => 12,
                'price' => 14
            ],
            [
                'name' => 'La Madre di Stifler',
                'description' => '2x 110 grammi di hamburger stagionato,  doppio cheddar, pancetta affumicata in due consistenze, sottaceti',
                'ingredients' => 'Panino di farina 00 al burro, burger di carne bovina, formaggio cheddar, pancetta affumicata, sottaceti',
                'cooking_time' => 11,
                'price' => 13
            ],
            [
                'name' => 'Loser',
                'description' => '2x 110 grammi di hamburger stagionato, cheddar, cipolla caramellata e salsa gochujang piccante',
                'ingredients' => 'Panino di farina 00 al burro, burger di carne bovina, formaggio cheddar, cipolla, zucchero, salsa gochujang',
                'cooking_time' => 9,
                'price' => 10
            ],
            [
                'name' => 'Patatine Fritte',
                'description' => 'Patate spagnole a pasta bianca fritte in olio di semi con erbe aromatiche',
                'ingredients' => 'Patate, erbe aromatiche, olio, sale',
                'cooking_time' => 10,
                'price' => 5
            ],
            [
                'name' => 'Patatine al formaggio e pancetta',
                'description' => 'Patate spagnole a pasta bianca fritte in olio di semi con cheddar e coriandolo',
                'ingredients' => 'Patate, formaggio cheddar, coriandolo, olio, sale',
                'cooking_time' => 10,
                'price' => 7
            ],
            [
                'name' => 'Patate dolci',
                'description' => 'Patate dolci spagnole fritte in olio di semi con erbe aromatiche',
                'ingredients' => 'Patate dolci, erbe aromatiche, olio, sale',
                'cooking_time' => 10,
                'price' => 6
            ],
            [
                'name' => 'Patate fritte con pulled pork',
                'description' => 'Patate spagnole a pasta bianca fritte in olio di semi con pulled pork',
                'ingredients' => 'Patate dolci, olio, sale, carne di maiale, spezie',
                'cooking_time' => 10,
                'price' => 6
            ],
            [
                'name' => 'Costine di maiale barbecue',
                'description' => 'Costine di maiale cotte  al barbecue con spezie',
                'ingredients' => 'Carne di maiale, spezie, olio, sale',
                'cooking_time' => 12,
                'price' => 14
            ],
        ];

        foreach($products_hundred as $product_hundred) {
            $product_hundred = new Product();
            $product_hundred->name = $product_hundred['name'];
            $product_hundred->cover = null;
            $product_hundred->description = $product_hundred['description'];
            $product_hundred->ingredients = $product_hundred['ingredients'];
            $product_hundred->cooking_time = $product_hundred['cooking_time'];
            $product_hundred->price = $product_hundred['price'];
            $product_hundred->visible = rand(0, 1);
            $product_hundred->user_id = 20;
            $product_hundred->save();
        }

        $products_manik = [
            [
                'name' => 'Il Cuscinetto',
                'description' => 'Medaglione di fassona piemontese 140gr., crema di peperoni, prescinsoa,rucola e pomodoro cuore di bue',
                'ingredients' => 'Farina 00, olio, burro, sale, carne di fassona, crema di peperoni, prescinsoa,rucola e pomodoro cuore di bue',
                'cooking_time' => 15,
                'price' => 15
            ],
            [
                'name' => 'La Lussuria',
                'description' => 'Medaglione di fassona piemontese 250gr, cheddar, patate fritte, salsa di avocado, julienne di cavolo viola',
                'ingredients' => 'Farina 00, olio, burro, sale, carne di fassona, cheddar, patate, avocado, cavolo viola',
                'cooking_time' => 15,
                'price' => 20
            ],
            [
                'name' => 'Il Piemontese',
                'description' => 'Medaglione di fassona piemontese 140gr., toma di langa, Salame cotto, tartufo di Alba',
                'ingredients' => 'Farina 00, olio, burro, sale, carne di fassona, toma di Langa, salame di maiale speziato, tartufo bianco',
                'cooking_time' => 15,
                'price' => 30
            ],
            [
                'name' => 'Il Polemico',
                'description' => 'Medaglione di fassona piemontese 180gr., crema di caprino, cheddar affumicato, cetriolini, pomodoro cuore di bue',
                'ingredients' => 'Farina 00, olio, burro, sale, carne di fassona, caprino d’alpeggio, cheddar, cetriolini, pomodoro cuore di bue, salsa barbecue, maionese, ketchup',
                'cooking_time' => 15,
                'price' => 12
            ],
            [
                'name' => 'Il Malizioso',
                'description' => 'Medaglione di fassona piemontese 250gr, crema di zucca, provola piccante, lattuga, cipolla, pomodoro, cetrioli e crema di broccoli',
                'ingredients' => 'Farina 00, olio, burro, sale, carne di fassona, zucca, provola, cipolla, pomodoro, cetrioli, broccoli, lattuga',
                'cooking_time' => 15,
                'price' => 16
            ],
            [
                'name' => 'Il Cordiale',
                'description' => 'Medaglione di fassona piemontese 250gr, lattuga, uova, olio al tartufo, maionese',
                'ingredients' => 'Farina 00, olio, burro, sale, carne di fassona, lattuga, uova, olio al tartufo, maionese',
                'cooking_time' => 16,
                'price' => 14
            ],
            [
                'name' => 'Il Sensuale',
                'description' => 'Medaglione di fassona piemontese 250gr, cipolla stufata, cetriolini, salsa rosa, cheddar',
                'ingredients' => 'Farina 00, olio, burro, sale, carne di fassona, cipolla, cetriolini, salsa rosa, cheddar',
                'cooking_time' => 16,
                'price' => 12
            ],
            [
                'name' => 'L\' Educato',
                'description' => 'Medaglione di fassona piemontese 250gr, doppio cheddar, cipolla in agrodolce, lattuga, ketchup',
                'ingredients' => 'Farina 00, olio, burro, sale, carne di fassona, cheddar, cipolla, lattuga, ketchup',
                'cooking_time' => 14,
                'price' => 12
            ],
            [
                'name' => 'L\' Invidioso',
                'description' => 'Medaglione di fassona piemontese 250gr, caprino piccante, cipolla rossa di Tropea, cavolo cappuccio, salsa greca',
                'ingredients' => 'Farina 00, polvere di cavolo viola, olio, burro, sale, carne di fassona, formaggio caprino, cipolla rossa di Tropea, cavolo cappuccio, yogurt',
                'cooking_time' => 16,
                'price' => 15
            ],
            [
                'name' => 'L\' Obeso',
                'description' => 'Triplo medaglione di fassona piemontese 250gr, cipolla caramellata, triplo cheddar, lattuga e ketchup',
                'ingredients' => 'Farina 00, olio, burro, sale, carne di fassona, cipolla, cheddar, lattuga e ketchup',
                'cooking_time' => 18,
                'price' => 19
            ],
            [
                'name' => 'Il Pazzo',
                'description' => 'Triplo medaglione di fassona piemontese 250gr, funghi porcini, aceto balsamico, lattuga, cheddar',
                'ingredients' => 'Farina 00, olio, burro, sale, carne di fassona, funghi porcini, aceto balsamico, lattuga, cheddar',
                'cooking_time' => 14,
                'price' => 17
            ],
            [
                'name' => 'Il Vegetariano',
                'description' => 'Melanzane fritte, formaggio toma arrostito, rucola, salsa barbecue',
                'ingredients' => 'Farina 00, olio, burro, sale, melanzane fritte, formaggio toma arrostito, rucola, salsa barbecue',
                'cooking_time' => 14,
                'price' => 17
            ],
        ];

        foreach($products_manik as $product_manik) {
            $product_manik = new Product();
            $product_manik->name = $product_manik['name'];
            $product_manik->cover = null;
            $product_manik->description = $product_manik['description'];
            $product_manik->ingredients = $product_manik['ingredients'];
            $product_manik->cooking_time = $product_manik['cooking_time'];
            $product_manik->price = $product_manik['price'];
            $product_manik->visible = rand(0, 1);
            $product_manik->user_id = 21;
            $product_manik->save();
        }

        ////////////////////////////////////////////////////////////////////

        // indiano
        $products_himalaya = [
            [
                'name' => 'Chana Masala',
                'description' => 'Curry indiano di ceci',
                'ingredients' => 'Ceci, cipolla, pomodorini, peperoncini verdi, curcuma, garam massaia, paprika, zenzero coriandolo',
                'cooking_time' => 14,
                'price' => 10
            ],
            [
                'name' => 'Samosa',
                'description' => 'Pasta fritta croccante ripiena di verdure',
                'ingredients' => 'Farina 00, olio, sale, patate, anacardi, cipolle, piselli, zenzero, spinaci, curcuma, aglio',
                'cooking_time' => 11,
                'price' => 9
            ],
            [
                'name' => 'Curry di pollo',
                'description' => 'Curry di pollo classico',
                'ingredients' => 'Pollo, pomodoro, faram masala, cumino, curcuma, peperoncino, coriandolo, yogurt',
                'cooking_time' => 16,
                'price' => 12
            ],
            [
                'name' => 'Naan all\'aglio',
                'description' => 'Tipico pane indiano cotto cotto nel forno tandoor',
                'ingredients' => 'Farina 0, acqua, yogurt bianco, sale, aglio, lievito, olio EVO, coriandolo',
                'cooking_time' => 5,
                'price' => 4
            ],
            [
                'name' => 'Pollo Tikka Masala',
                'description' => 'Bocconcini di pollo marinato con spezie e yogurt',
                'ingredients' => 'Pollo, yogurt greco, aglio, garam Masala, sale, zenzero, paprika affumicata, lime, pomodoro',
                'cooking_time' => 12,
                'price' => 10
            ],
            [
                'name' => 'Shami Kebabs',
                'description' => 'Polpettone di agnello e legumi',
                'ingredients' => 'Agnello, ceci, cipolle, aglio, peperoncino, cardamomo, chiodi di garofano, olio, cannella, uova, burro, sale',
                'cooking_time' => 16,
                'price' => 13
            ],
        ];

        foreach($products_himalaya as $product_himalaya) {
            $product_himalaya = new Product();
            $product_himalaya->name = $product_himalaya['name'];
            $product_himalaya->cover = null;
            $product_himalaya->description = $product_himalaya['description'];
            $product_himalaya->ingredients = $product_himalaya['ingredients'];
            $product_himalaya->cooking_time = $product_himalaya['cooking_time'];
            $product_himalaya->price = $product_himalaya['price'];
            $product_himalaya->visible = rand(0, 1);
            $product_himalaya->user_id = 22;
            $product_himalaya->save();
        }

        $products_moon = [
            [
                'name' => 'Biryani di verdure',
                'description' => 'Piatto unico vegetariano a base di riso, piselli, cipolla fritta, spezie aromatiche e yogurt fresco',
                'ingredients' => 'Riso basmati, piselli, cipolla, anacardi tostati, yogurt bianco, peperoncino, cumino, curcuma fagiolini, garam masala',
                'cooking_time' => 11,
                'price' => 9
            ],
            [
                'name' => 'Dahl',
                'description' => 'Dahl di lenticchie e verdure con curry e zenzero fresco',
                'ingredients' => 'Lenticchie, sedano, zenzero, curcuma, carote, scalogna, latte di cocco, peperoncino, curry',
                'cooking_time' => 13,
                'price' => 8
            ],
            [
                'name' => 'Bhel Puri',
                'description' => 'Snack salato di riso soffiato, verdure e tamarindo',
                'ingredients' => 'Riso soffiato, arachidi, ceci tostati, cetrioli, patate, cipolla, pomodoro, limone, coriandolo, tamarindo, chaat masala',
                'cooking_time' => 15,
                'price' => 6
            ],
            [
                'name' => 'Pani Puri',
                'description' => 'Pane fritto cavo ripieno di ceci e patate, con chutney e salsa allo yogurt',
                'ingredients' => 'Farina di semola, sale, lievito, olio evo, ceci, patate, cipolle, zucchero, yogurt',
                'cooking_time' => 18,
                'price' => 7
            ],
        ];

        foreach($products_moon as $product_moon) {
            $product_moon = new Product();
            $product_moon->name = $product_moon['name'];
            $product_moon->cover = null;
            $product_moon->description = $product_moon['description'];
            $product_moon->ingredients = $product_moon['ingredients'];
            $product_moon->cooking_time = $product_moon['cooking_time'];
            $product_moon->price = $product_moon['price'];
            $product_moon->visible = rand(0, 1);
            $product_moon->user_id = 23;
            $product_moon->save();
        }

        ////////////////////////////////////////////////////////////////////

        // messicano
        $products_elpueblo = [
            [
                'name' => 'Guacamole e nachos',
                'description' => 'Crema di avocado servita con chips di mais',
                'ingredients' => 'Avocado, cipolla, pomodoro, prezzemolo, sale limone, chips di mais',
                'cooking_time' => 8,
                'price' => 7
            ],
            [
                'name' => 'Langostinos con Mango',
                'description' => 'Gamberoni Langostinos con Mango, limone e fiori eduli',
                'ingredients' => 'Gamberoni Langostinos dell’Oceano Pacifico, olio, sale, limone e fiori eduli',
                'cooking_time' => 17,
                'price' => 18
            ],
            [
                'name' => 'Tacos con chili',
                'description' => 'Tortillas di mais con chili di carne di manzo, cipolla, pomodori e peperoni verdi',
                'ingredients' => 'Tortillas di mais, stufato di carne di manzo, peperoncino, sale, olio, cipolla, pomodori e peperoni verdi',
                'cooking_time' => 12,
                'price' => 10
            ],
        ];

        foreach($products_elpueblo as $product_elpueblo) {
            $product_elpueblo = new Product();
            $product_elpueblo->name = $product_elpueblo['name'];
            $product_elpueblo->cover = null;
            $product_elpueblo->description = $product_elpueblo['description'];
            $product_elpueblo->ingredients = $product_elpueblo['ingredients'];
            $product_elpueblo->cooking_time = $product_elpueblo['cooking_time'];
            $product_elpueblo->price = $product_elpueblo['price'];
            $product_elpueblo->visible = rand(0, 1);
            $product_elpueblo->user_id = 24;
            $product_elpueblo->save();
        }

        $products_piedradelsol = [
            [
                'name' => 'Chimichanga',
                'description' => 'Pacchettini di tortillas fritti ripieni di carne fagioli e verdure',
                'ingredients' => 'Farina di mais, aglio, peperoncino pansilla, carne di manzo, fagioli, patate, pepe, olio, sale',
                'cooking_time' => 11,
                'price' => 9
            ],
            [
                'name' => 'Enchilada',
                'description' => 'Tortillas arrotolate ripiene di pollo, fagioli neri, pomodori, cheddar e cipolla',
                'ingredients' => 'Lenticchie, sedano, zenzero, curcuma, carote, scalogna, latte di cocco, peperoncino, curry',
                'cooking_time' => 14,
                'price' => 8
            ],
            [
                'name' => 'Fajita',
                'description' => 'Filetti di pollo con cipolle e peperoni grigliata',
                'ingredients' => 'Pollo, olio, sale, pepe, peperoncino, cipolle e peperoni',
                'cooking_time' => 19,
                'price' => 12
            ],
            [
                'name' => 'Frijoles refritos e tortillas',
                'description' => 'Crema di fagioli neri al burro, con aglio e cipolla',
                'ingredients' => 'Fagioli neri, burro, aglio, cipolla, cumino, pepe, coriandolo',
                'cooking_time' => 14,
                'price' => 9
            ],
        ];

        foreach($products_piedradelsol as $product_piedradelsol) {
            $product_piedradelsol = new Product();
            $product_piedradelsol->name = $product_piedradelsol['name'];
            $product_piedradelsol->cover = null;
            $product_piedradelsol->description = $product_piedradelsol['description'];
            $product_piedradelsol->ingredients = $product_piedradelsol['ingredients'];
            $product_piedradelsol->cooking_time = $product_piedradelsol['cooking_time'];
            $product_piedradelsol->price = $product_piedradelsol['price'];
            $product_piedradelsol->visible = rand(0, 1);
            $product_piedradelsol->user_id = 25;
            $product_piedradelsol->save();
        }

        ////////////////////////////////////////////////////////////////////

        // pizzeria
        $products_damichele = [
            [
                'name' => 'Verace',
                'description' => 'Pizza con salsa verace, pomodorini, burrata e basilico',
                'ingredients' => 'Farina 00, lievito, sale, olio EVO,  salsa di pomodoro verace, pomodorini, burrata DOP e basilico',
                'cooking_time' => 4,
                'price' => 8
            ],
            [
                'name' => 'Norma',
                'description' => 'Pizza con passata di pomodoro, mozzarella, melanzane fritte e basilico',
                'ingredients' => 'Farina 00, lievito, sale, olio EVO, passata di pomodoro, mozzarella, melanzane fritte e basilico',
                'cooking_time' => 4,
                'price' => 9
            ],
            [
                'name' => 'Scarola e acciughe',
                'description' => 'Pizza bianca con fiordilatte, scarola, olive e acciughe',
                'ingredients' => 'Farina 00, lievito, sale, fiordilatte, scarola, olive, acciughe  e olio EVO',
                'cooking_time' => 19,
                'price' => 12
            ],
        ];

        foreach($products_damichele as $product_damichele) {
            $product_damichele = new Product();
            $product_damichele->name = $product_damichele['name'];
            $product_damichele->cover = null;
            $product_damichele->description = $product_damichele['description'];
            $product_damichele->ingredients = $product_damichele['ingredients'];
            $product_damichele->cooking_time = $product_damichele['cooking_time'];
            $product_damichele->price = $product_damichele['price'];
            $product_damichele->visible = rand(0, 1);
            $product_damichele->user_id = 26;
            $product_damichele->save();
        }

        $products_pizzeriagourmet = [
            [
                'name' => 'Burrata, fiori di zucca, alici del Cantabrico',
                'description' => 'Impasto classico 48h di lievitazione con alici del Cantabrico, mozzarella fiordilatte, fiori di zucca, burrata e olio allo zenzero',
                'ingredients' => 'Farina 00, acqua, lievito madre, mozzarella fiordilatte, fiori di zucca freschi, burrata DOP, alici del Cantabrico, olio EVO allo zenzero',
                'cooking_time' => 10,
                'price' => 11
            ],
            [
                'name' => 'Margherita 2.0',
                'description' => 'Impasto classico 48h di lievitazione con pomodorino di Pachino DOP, mozzarella fiordilatte, scaglie di parmigiano 36 mesi DOP e basilico',
                'ingredients' => 'Farina 00, acqua, lievito madre, mozzarella fiordilatte, pomodorini di Pachino DOP, parmigiano 36 mesi DOP, basilico fresco ed olio EVO',
                'cooking_time' => 10,
                'price' => 12.50
            ],
            [
                'name' => 'Irpinia',
                'description' => 'Impasto ai cereali 48h di lievitazione con Patata viola, provola affumicata, speck, caciocavallo irpino stagionato in grotta, pomodoro del piennolo in confit',
                'ingredients' => 'Farina 00, acqua, lievito madre, patate viola, provola affumicata, speck, caciocavallo irpino DOP stagionato in grotta, pomodoro del piennolo confit',
                'cooking_time' => 10,
                'price' => 14
            ],
        ];

        foreach($products_pizzeriagourmet as $product_pizzeriagourmet) {
            $product_pizzeriagourmet = new Product();
            $product_pizzeriagourmet->name = $product_pizzeriagourmet['name'];
            $product_pizzeriagourmet->cover = null;
            $product_pizzeriagourmet->description = $product_pizzeriagourmet['description'];
            $product_pizzeriagourmet->ingredients = $product_pizzeriagourmet['ingredients'];
            $product_pizzeriagourmet->cooking_time = $product_pizzeriagourmet['cooking_time'];
            $product_pizzeriagourmet->price = $product_pizzeriagourmet['price'];
            $product_pizzeriagourmet->visible = rand(0, 1);
            $product_pizzeriagourmet->user_id = 27;
            $product_pizzeriagourmet->save();
        }

        ////////////////////////////////////////////////////////////////////

        // vegano
        $products_romeowcatbistrot = [
            [
                'name' => 'Arancini su crema di zucca e chips di patate',
                'description' => 'Arancini di riso al pomodoro e piselli su crema di zucca mantovana, chips di patate croccanti, riduzione di aceto balsamico e prezzemolo',
                'ingredients' => 'Cipolla, olio, riso, pomodoro, piselli, zucca mantovana, patate bianche, aceto balsamico e prezzemolo',
                'cooking_time' => 20,
                'price' => 10
            ],
            [
                'name' => 'Insalata d’autunno',
                'description' => 'Insalata di radicchio nostrano e ravanello, con fagiolini , piselli, noci pecan , petali di girasole e spuma di yogurt vegetale',
                'ingredients' => 'Radicchio, ravanelli, fagiolini, piselli, noci pecan, fiori di girasole, yogurt bianco vegetale, olio EVO',
                'cooking_time' => 10,
                'price' => 8
            ],
            [
                'name' => 'Croccante di banane e caramello salato, ricoperto di cioccolato fondente alle mandorle',
                'description' => 'Gelato artigianale alla banana con biscotto d’avena e caramello salato  ricoperto di cioccolato fondente al 90% croccante e mandorle siciliane',
                'ingredients' => 'Latte di soia, zucchero, sale olio, banane fresche ed essiccate, biscotto d’avena, cioccolato fondente di Modica al 90% e mandorle',
                'cooking_time' => 10,
                'price' => 7
            ],
        ];

        foreach($products_romeowcatbistrot as $product_romeowcatbistrot) {
            $product_romeowcatbistrot = new Product();
            $product_romeowcatbistrot->name = $product_romeowcatbistrot['name'];
            $product_romeowcatbistrot->cover = null;
            $product_romeowcatbistrot->description = $product_romeowcatbistrot['description'];
            $product_romeowcatbistrot->ingredients = $product_romeowcatbistrot['ingredients'];
            $product_romeowcatbistrot->cooking_time = $product_romeowcatbistrot['cooking_time'];
            $product_romeowcatbistrot->price = $product_romeowcatbistrot['price'];
            $product_romeowcatbistrot->visible = rand(0, 1);
            $product_romeowcatbistrot->user_id = 28;
            $product_romeowcatbistrot->save();
        }

        $products_soulkitchen = [
            [
                'name' => 'Profumi d\'autunno',
                'description' => 'Melanzana arrossita su quadrato di farinata di piselli, formaggio vegetale , verdure di stagione e menta',
                'ingredients' => 'Melanzane, farina di ceci, piselli, verdure di campo, ravanello e cavolo viola',
                'cooking_time' => 15,
                'price' => 13
            ],
            [
                'name' => 'Barbabiela, topinambur, olive taggiasche',
                'description' => 'Affettato di barbabietole e topinambur cotti a bassa temperatura sottovuoto con polvere di olive taggiasche',
                'ingredients' => 'Barbabietola, topinambur, erbe aromatiche, olive taggiasche',
                'cooking_time' => 15,
                'price' => 12
            ],
            [
                'name' => 'Croccante bianco',
                'description' => 'Meringa salata, crema di mango e pesto di erbe di campo con grissino alla paprika affumicata',
                'ingredients' => 'Acqua faba, mango, erbe di campo, pinoli, aglio, farina integrale, paprika affumicata',
                'cooking_time' => 17,
                'price' => 11
            ],
        ];

        foreach($products_soulkitchen as $product_soulkitchen) {
            $product_soulkitchen = new Product();
            $product_soulkitchen->name = $product_soulkitchen['name'];
            $product_soulkitchen->cover = null;
            $product_soulkitchen->description = $product_soulkitchen['description'];
            $product_soulkitchen->ingredients = $product_soulkitchen['ingredients'];
            $product_soulkitchen->cooking_time = $product_soulkitchen['cooking_time'];
            $product_soulkitchen->price = $product_soulkitchen['price'];
            $product_soulkitchen->visible = rand(0, 1);
            $product_soulkitchen->user_id = 29;
            $product_soulkitchen->save();
        }

        ////////////////////////////////////////////////////////////////////

        // vietnamita
        $products_casavietnam = [
            [
                'name' => 'Gỏi cuốn',
                'description' => 'Involti Estate ripieni di riso,  verdure e gamberetti',
                'ingredients' => 'Riso per sushi, aceto di riso, carta di riso, avocado, gamberetti, arachidi basilico e menta',
                'cooking_time' => 12,
                'price' => 8
            ],
            [
                'name' => 'Bun Bo Nam Bo',
                'description' => 'Zuppa del Sud del Vietnam con noodles, carne di manzo, erbe aromatiche e brodo di pesce',
                'ingredients' => 'Noddles, carne di manzo arrosto, cipolline, aglio, citronella, salsa di pesce, arachidi, papaya, sale, pepe, aceto',
                'cooking_time' => 25,
                'price' => 12
            ],
            [
                'name' => 'Bun Cha',
                'description' => 'Spaghetti di riso con maiale e verdure',
                'ingredients' => 'Spaghetti di riso, carne di maiale, aglio, salsa di pesce, germogli di soia, coriandolo, menta, basilico, lime',
                'cooking_time' => 14,
                'price' => 11
            ],
            [
                'name' => 'Muc Nhoi Thit',
                'description' => 'Calamari ripieni di carne di maiale macinata condita con spezie e salse vietnamite',
                'ingredients' => 'Calamari, carne di maiale, cipolle verdi, zenzero, salsa di pesce, pepe, sale, pan grattato',
                'cooking_time' => 25,
                'price' => 19
            ],
            [
                'name' => 'Banh Beo',
                'description' => 'Tortini di riso con gamberi al vapore e peperoni in salsa nước mắm',
                'ingredients' => 'Farina di tapioca, farina di riso, gamberi, erba cipollina, salsa di pesce, aglio, peperoncino, sale',
                'cooking_time' => 17,
                'price' => 11
            ],
        ];

        foreach($products_casavietnam as $product_casavietnam) {
            $product_casavietnam = new Product();
            $product_casavietnam->name = $product_casavietnam['name'];
            $product_casavietnam->cover = null;
            $product_casavietnam->description = $product_casavietnam['description'];
            $product_casavietnam->ingredients = $product_casavietnam['ingredients'];
            $product_casavietnam->cooking_time = $product_casavietnam['cooking_time'];
            $product_casavietnam->price = $product_casavietnam['price'];
            $product_casavietnam->visible = rand(0, 1);
            $product_casavietnam->user_id = 30;
            $product_casavietnam->save();
        }

        $products_thienkim = [
            [
                'name' => 'Pho',
                'description' => 'Pho, la zuppa tipica nazionale del Vietnam, servita con noodles di riso e carne di manzo con peperoni, foglie di menta, lime e germogli di soia',
                'ingredients' => 'Aglio, cipolla, porro, spaghetti di riso, carne di manzo stufata, peperoni, menta, lime e germogli',
                'cooking_time' => 12,
                'price' => 10
            ],
            [
                'name' => 'Bo kho',
                'description' => 'Stufato di manzo con anice stellato e citronella, un piatto tipico della cucina vietnamita',
                'ingredients' => 'Carne di manzo, aglio,  scalogna, patate, carote, acqua di cocco, anice stellato, cannella, cardamomo,  peperoncino e basilico thailandese',
                'cooking_time' => 15,
                'price' => 14
            ],
            [
                'name' => 'Banh Xeo',
                'description' => 'crêpe di farina di riso, latte di cocco e curcuma, farcita con pesce, germogli di soia. Viene servita fritta e avvolta in foglie di lattuga e  con menta',
                'ingredients' => 'Farina di riso, latte di cocco, cipollato fresco, carote, curcuma, gamberi, salsa di soia, semi di sesamo, germogli di soia e spinaci freschi',
                'cooking_time' => 14,
                'price' => 13.5
            ],
        ];

        foreach($products_thienkim as $products_thienkim) {
            $products_thienkim = new Product();
            $products_thienkim->name = $products_thienkim['name'];
            $products_thienkim->cover = null;
            $products_thienkim->description = $products_thienkim['description'];
            $products_thienkim->ingredients = $products_thienkim['ingredients'];
            $products_thienkim->cooking_time = $products_thienkim['cooking_time'];
            $products_thienkim->price = $products_thienkim['price'];
            $products_thienkim->visible = rand(0, 1);
            $products_thienkim->user_id = 31;
            $products_thienkim->save();
        }
    }
}