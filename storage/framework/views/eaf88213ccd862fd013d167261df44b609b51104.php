<?php $__env->startSection('title', 'Lista Heróis'); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        function clicaExcluir(id) {
            document.getElementById('id').value = id;
            form.submit();
        }

        $(document).ready(function () {

        });
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="mt-4">Lista Heróis</h1>

    <div class="card p-2">
        <h4 class="card-title">Buscar</h4>
        <h4 class="card-body">
            <form name='form' method="POST" action="<?php echo e(url('herois')); ?>">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-2">
                        <label for="nome">Nome:</label>
                    </div>
                    <div class="col-sm">
                        <input name="nome" id="nome" class="form-control" placeholder="nome do herói"/>
                        <input name="id" id="id" type="hidden"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col p-2">
                        <button class="btn btn-primary btn-block">Buscar</button>
                    </div>
                </div>
            </form>
        </h4>
    </div>

    <div>
        <p class="text-right">
            <a href="<?php echo e(url('/herois/save')); ?>"><i class="fas fa-plus-square mr-1"></i>Novo</a>
            
        </p>
        <table class="table">
            <thead>
                <tr>
                    <th>Excluir</th>
                    <th>Nome</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $herois; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $heroi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td>
                            <a href="#" onclick="clicaExcluir(<?php echo e($heroi->id); ?>)"><i class="fas fa-trash-alt"></i>  Excluir</a>
                            <a href="<?php echo e(url('/herois/save?id='.$heroi->id)); ?>"><i class="fas fa-edit"></i>  Editar</a>
                        </td>
                        <td>
                            <a href="<?php echo e(url('/herois/save?id='.$heroi->id)); ?>"><?php echo e($heroi->nome); ?></a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="2">
                            <p>Os meus heróis morreram de overdose.</p>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>