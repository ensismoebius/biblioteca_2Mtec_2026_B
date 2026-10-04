<?php

namespace App\Models\Concerns;

use App\Models\Auditoria;
use Illuminate\Database\Eloquent\Model;

/**
 * Adicione `use Auditavel;` a um model para registrar criação, edição e exclusão.
 */
trait Auditavel
{
    /**
     * O Laravel chama este método sozinho (bootNomeDaTrait) ao iniciar o model.
     */
    public static function bootAuditavel(): void
    {
        static::created(function (Model $modelo): void {
            Auditoria::registrar('criou', $modelo, null, $modelo->getAttributes());
        });

        static::updated(function (Model $modelo): void {
            $depois = $modelo->getChanges();
            $antes = array_intersect_key($modelo->getOriginal(), $depois);

            Auditoria::registrar('editou', $modelo, $antes, $depois);
        });

        static::deleted(function (Model $modelo): void {
            Auditoria::registrar('excluiu', $modelo, $modelo->getOriginal(), null);
        });
    }
}
