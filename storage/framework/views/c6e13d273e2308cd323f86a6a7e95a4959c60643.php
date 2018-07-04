<?php $__env->startSection('title', 'Cadastra Herói'); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        function toggleTerraqueo() {
            if(document.getElementById('terraqueo').checked) {
                document.getElementById('pais').setAttribute('style', 'display:block');
                document.getElementById('planeta').setAttribute('style', 'display:none');
            } else {
                document.getElementById('pais').setAttribute('style', 'display:none');
                document.getElementById('planeta').setAttribute('style', 'display:block');
            }
        }

        $(document).ready(function() {
            toggleTerraqueo();
        });
    </script>
<?php $__env->stopPush(); ?>

<style>
    .foto {
        height: 10em;
    }
</style>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="mt-4">Cadastra Herói</h1>

    <div class="card p-2">
        <h4 class="card-title">Inserir dados</h4>
        <h4 class="card-body">
            <form name='form' method="POST" action="<?php echo e(url('herois/save')); ?>">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-3">
                        <div class="card foto">
                            <h4 class="card-title">Foto</h4>

                        </div>
                    </div>
                    <div class="col">
                        <div class="row pb-4">
                            <div class="col-2">
                                <label for="nome">Nome:</label>
                            </div>
                            <div class="col">
                                <input type="text"
                                       class="form-control"
                                       id="nome"
                                       name="nome"
                                       value="<?php echo e($heroi->nome); ?>"
                                       placeholder="insira aqui o nome do herói"/>

                                <input type="hidden" name="id" value="<?php echo e($heroi->id); ?>">
                            </div>
                        </div>
                        <div class="row pb-4">
                            <div class="col-2">
                                <label for="sexo">Sexo:</label>
                            </div>
                            <div class="col">
                                <label class="pr-4"><input type="radio"
                                                           value="M"
                                                           <?php echo e($heroi->sexo == 'M' ? "checked" : ""); ?>

                                                           name="sexo" /> Masculino</label>
                                <label class="pr-4"><input type="radio"
                                                           value="F"
                                                           <?php echo e($heroi->sexo == 'F' ? "checked" : ""); ?>

                                                           name="sexo" /> Feminino</label>
                                <label class="pr-4"><input type="radio"
                                                           value="O"
                                                           <?php echo e($heroi->sexo == 'O' ? "checked" : ""); ?>

                                                           name="sexo" /> Outro</label>
                            </div>
                        </div>
                        <div class="row pb-4">
                            <div class="col-2">
                                <label for="terraqueo">Terráqueo?</label>
                            </div>
                            <div class="col-1">
                                <input type="checkbox"
                                       id="terraqueo"
                                       name="terraqueo"
                                       <?php echo e($heroi->terraqueo == 'S' ? "checked" : ""); ?>

                                       onclick="toggleTerraqueo()">
                            </div>
                            <div id="pais" class="col">
                                <div class="row">
                                    <div class="col-2">
                                        <label for="pais">País:</label>
                                    </div>
                                    <div class="col">
                                        <input type="text"
                                               class="form-control"
                                               id="pais"
                                               name="pais"
                                               value="<?php echo e($heroi->pais); ?>"
                                               placeholder="insira o país do herói terráqueo">
                                    </div>
                                </div>
                            </div>
                            <div id="planeta" class="col">
                                    <div class="row">
                                        <div class="col-2">
                                            <label for="planeta">Planeta:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text"
                                                   class="form-control"
                                                   id="planeta"
                                                   name="planeta"
                                                   value="<?php echo e($heroi->planeta); ?>"
                                                   placeholder="insira o planeta do herói alienígena">
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col p-2">
                        <button class="btn btn-primary btn-block">Salvar</button>
                    </div>
                </div>
            </form>
        </h4>
    </div>
    <a href="<?php echo e(url('/herois')); ?>"><< Voltar</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>