<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'descripcion', 'precio', 'ubicacion', 'demostracion'];
}
// En el modelo Products (app/Models/Products.php)


