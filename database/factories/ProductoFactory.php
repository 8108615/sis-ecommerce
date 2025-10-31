<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       //Precios base  para calculos realistas
       $precioCompra = $this->faker->randomFloat(2, 10, 500);
       $margenGanancia = $this->faker->randomElement([0.15, 0.20, 0.25, 0.30, 0.35, 0.40]);
       $precioVenta = $precioCompra * (1 + $margenGanancia);

       //Generar codigo unico
       $codigo = 'PROD' . $this->faker->unique()->numberBetween(1000, 9999);

       //Nombre de productos realistas por categoria
       $nombresElectronica = [
        'Smartphone Samsung Galaxi', 'Laptop Dell Inspiron', 'Tablet iPad Air',
        'Smart TV 55" 4k', 'Auriculares Inalambricos', 'Smartwatch Apple',
        'Cámara DSLR Canon', 'Altavoz Bluetood JBL', 'Monitor Gaming 27"',
        'Teclado Mecanico RGB', 'Mouse Inalambrico', 'Impresora Multifuncional'
       ];

       $nombresRopa = [
        'Camiseta Basica Algodon', 'Jeans Slim Fit', 'Sudadera con Capucha',
        'Zapatos Deportivos Running', 'Chaqueta Denin', 'Vestido Casual',
        'Polo Clasico', 'Shorts Deportivos', 'Chamarra de Cuero',
        'Falda Plisada', 'Blusa Elegante', 'Traje Formal'
       ];

       $nombresHogar = [
        'juego de Sabanas King', 'Cafetera Programable', 'Licuadora de 8 Velocidades',
        'Aspiradora Robot', 'Juegos de Ollas Antiadherente', 'Microondas Digital',
        'Batidora de Mano', 'Tostadora de 4 Ranuras', 'Jarras Electrica',
        'Ser de Cubiertos Acero', 'Olla de Coccion Lenta', 'Freidora de Aire'
       ];

       $nombresDeportes = [
        'Pelota de Futbol Profesional', 'Raqueta de Tennis', 'Bicicleta de Montaña',
        'mancuerdas Ajustables', 'Colchoneta Yoga', 'Cinta para Correr',
        'Set de Golf', 'Balon de Baloncesto', 'pesas Rusas',
        'Cuerda para Saltar', 'Bandas de Resistencias', 'Reloj Deportivo'
       ];

       $todosNombres = array_merge(
        $nombresElectronica,
        $nombresRopa,
        $nombresHogar,
        $nombresDeportes
       );

       $nombre = $this->faker->randomElement($todosNombres) . ' ' .
                 $this->faker->randomElement(['Pro', 'Max', 'Plus', 'Elite', 'Premium', 'Standard']);
                
       return [
            'categoria_id' => Categoria::inRandomOrder()->first()->id ?? Categoria::factory()->create()->id,
            'nombre' => $nombre,
            'codigo' => $codigo,
            'descripcion_corta' => $this->faker->sentence(8),
            'descripcion_larga' => $this->faker->paragraphs(3, true),
            'precio_compra' => $precioCompra,
            'precio_venta' => round($precioVenta, 2),
            'stock' => $this->faker->numberBetween(0, 100),

       ];
    }
}
