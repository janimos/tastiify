<?php

use Illuminate\Database\Seeder;
use App\ProductDescriptionPhoto;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;

class ProductDescriptionPhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      ProductDescriptionPhoto::truncate();

      $path = public_path() . '/images/pocky.png';
      if(!File::exists($path)) {
       return response()->json(['message' => 'Image not found.'], 404);
      }
      $file = File::get($path);
      $img = Image::make($file);
      Response::make($img->encode('jpeg'));
      ProductDescriptionPhoto::create([
        'product_id' => 1,
        'description' => "Pocky is about sharing happiness and bringing people together.
                          The perfect balance of high quality creamy chocolate and the crunch of a biscuit stick gives Pocky its irresistible taste.",
        'image' => $img,
      ]);

      $path = public_path() . '/images/alyonka.png';
      if(!File::exists($path)) {
       return response()->json(['message' => 'Image not found.'], 404);
      }
      $file = File::get($path);
      $img = Image::make($file);
      Response::make($img->encode('jpeg'));
      ProductDescriptionPhoto::create([
        'product_id' => 2,
        'description' => "Milk chocolate Alenka- a delicacy made from cocoa fruits. The product has a homogeneous structure with a delicate aroma and sweet aftertaste. A recipe unchanged from 1966, a classic, world-famous wrapper with a blue-eyed girl image. We put our hearts into our chocolate's production, that's why it never ceases to delight the consumer with its quality and diversity.

Ingredients: sugar, whole milk powder, cocoa butter, cocoa liquor, emulsifiers: soy lecithin, Е476; flavors.
Contraindicated in case of individual intolerance to milk protein. Mass fraction: total cocoa solids - not less than 32.0%; dry nonfat cocoa residue - not less than 5.9%; skimmed milk residues - at least 15.2%; milk fat - not less than 5.4%. Minor amounts of almond and hazelnut are possible.
Energy composition: protein: 7.00 g, fat: 7.00 g ,carbohydrate: 53.00 g Energy value: 550.00 kcal

Storage conditions: store at a temperature of +15 to +21 degrees C and relative air humidity not more than 75%. Do not expose to direct sunlight.",
        'image' => $img,
      ]);

      $path = public_path() . '/images/gailitis.png';
      if(!File::exists($path)) {
       return response()->json(['message' => 'Image not found.'], 404);
      }
      $file = File::get($path);
      $img = Image::make($file);
      Response::make($img->encode('jpeg'));
      ProductDescriptionPhoto::create([
        'product_id' => 3,
        'image' => $img,
      ]);

      $path = public_path() . '/images/turron.png';
      if(!File::exists($path)) {
       return response()->json(['message' => 'Image not found.'], 404);
      }
      $file = File::get($path);
      $img = Image::make($file);
      Response::make($img->encode('jpeg'));
      ProductDescriptionPhoto::create([
        'product_id' => 4,
        'description' => "Traditional Spanish turrón may be classified as
                          Hard (the Alicante variety): A compact block of whole almonds in a brittle mass of eggs, honey and sugar; 60% almonds.
                          Soft (the Jijona variety): The almonds are reduced to a paste. The addition of oil makes the matrix more chewy and sticky; 64% almonds.[5]
                          This variation in ingredients and resulting dryness reflects a continuum that exists also in amaretto (almond flavored) cookies, from a meringue to a macaroon.
                          Other varieties include Torró d'Agramunt from near Lleida, Torró de Xerta from near Tortosa and torró de Casinos.
                          Modernly the name turrón has widened its meaning in Spain to include many other sweet preparations that have in common with traditional turrón being sold in bars of around 20 x 10 x 3 cm. These bars can feature chocolate, marzipan, coconut, caramel, candied fruit, etc.",
        'image' => $img,
      ]);
    }
}
