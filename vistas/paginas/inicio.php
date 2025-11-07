<?php
// Verificar si hay sesión activa
$usuarioLogueado = null;
if(isset($_SESSION["validarIngreso"]) && $_SESSION["validarIngreso"] == "ok"){
    $usuarioLogueado = ControladorFormularios::ctrMostrarPerfil();
}
?>

<!-- Contenido Principal -->
<div class="container mt-4 flex-grow-1">

    <!-- Flash message -->
    <?php if($usuarioLogueado): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check2-circle"></i> Bienvenido al blog <strong><?php echo $usuarioLogueado["usuario"]; ?></strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    <?php else: ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <i class="bi bi-info-circle"></i> Bienvenido al blog. <a href="index.php?pagina=login" class="alert-link">Inicia sesión</a> para crear artículos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    <?php endif; ?>

    <!-- Cabecera del listado -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Últimos artículos</h4>
    </div>

    <!-- Botón crear artículo (solo si está logueado) -->
    <?php if($usuarioLogueado): ?>
    <div class="row mb-4">
        <div class="col-12 text-end">
            <button class="btn btn-dark d-inline-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#crearArticuloModal">
                <i class="bi bi-plus-circle"></i><span>Crear Artículo</span>
            </button>
        </div>
    </div>
    <?php endif; ?>

    <!-- Modal crear artículo -->
    <div class="modal fade" id="crearArticuloModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear Nuevo Artículo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <form id="formArticulo" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" maxlength="200" required>
                        </div>

                        <div class="mb-3">
                            <label for="categoria" class="form-label">Categoría</label>
                            <select class="form-select" id="categoria" name="categoria" required>
                                <option value="">Seleccionar categoría</option>
                                <option value="frontend">Front End</option>
                                <option value="backend">Back End</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="contenido" class="form-label">Contenido</label>
                            <textarea class="form-control" id="contenido" name="contenido" rows="8" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" form="formArticulo" class="btn btn-dark">Publicar Artículo</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Listado de artículos -->
    <div class="row">
        <!-- Artículo 1 -->
        <div class="col-md-12 mb-4">
            <div class="card border-dark">
                <div class="card-body">
                    <details class="article-details">
                        <summary style="cursor:pointer; list-style:none;">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="card-title mb-0 fw-bold">
                                    Introducción a React Hooks
                                </h5>
                                <span class="badge bg-dark">Front End</span>
                            </div>
                            <p class="card-text text-muted small mb-0 d-flex align-items-center gap-2">
                                <span class="d-inline-flex align-items-center gap-1">
                                    <i class="bi bi-person" style="font-size:14px;"></i>
                                    <span>Juan Pérez</span>
                                </span>
                                <span class="mx-2">|</span>
                                <span class="d-inline-flex align-items-center gap-1">
                                    <i class="bi bi-calendar" style="font-size:14px;"></i>
                                    <span>04/11/2025</span>
                                </span>
                            </p>
                        </summary>
                        <div class="mt-3 pt-3 border-top">
                            <p class="card-text">
                                Los React Hooks revolucionaron la forma en que escribimos componentes funcionales.<br>
                                useState y useEffect son los más utilizados para manejar estado y efectos secundarios.
                            </p>
                        </div>
                    </details>
                </div>
            </div>
        </div>

        <!-- Artículo 2 -->
        <div class="col-md-12 mb-4">
            <div class="card border-dark">
                <div class="card-body">
                    <details class="article-details">
                        <summary style="cursor:pointer; list-style:none;">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="card-title mb-0 fw-bold">
                                    Node.js y Express: Construyendo APIs REST
                                </h5>
                                <span class="badge bg-dark">Back End</span>
                            </div>
                            <p class="card-text text-muted small mb-0 d-flex align-items-center gap-2">
                                <span class="d-inline-flex align-items-center gap-1">
                                    <i class="bi bi-person" style="font-size:14px;"></i>
                                    <span>María López</span>
                                </span>
                                <span class="mx-2">|</span>
                                <span class="d-inline-flex align-items-center gap-1">
                                    <i class="bi bi-calendar" style="font-size:14px;"></i>
                                    <span>03/11/2025</span>
                                </span>
                            </p>
                        </summary>
                        <div class="mt-3 pt-3 border-top">
                            <p class="card-text">
                                Express.js es un framework minimalista para Node.js que facilita la creación de APIs REST.<br>
                                Con su sistema de middleware, podemos estructurar aplicaciones escalables y mantenibles.
                            </p>
                        </div>
                    </details>
                </div>
            </div>
        </div>

        <!-- Artículo 3 -->
        <div class="col-md-12 mb-4">
            <div class="card border-dark">
                <div class="card-body">
                    <details class="article-details">
                        <summary style="cursor:pointer; list-style:none;">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="card-title mb-0 fw-bold">
                                    CSS Grid vs Flexbox: ¿Cuándo usar cada uno?
                                </h5>
                                <span class="badge bg-dark">Front End</span>
                            </div>
                            <p class="card-text text-muted small mb-0 d-flex align-items-center gap-2">
                                <span class="d-inline-flex align-items-center gap-1">
                                    <i class="bi bi-person" style="font-size:14px;"></i>
                                    <span>Carlos Ramírez</span>
                                </span>
                                <span class="mx-2">|</span>
                                <span class="d-inline-flex align-items-center gap-1">
                                    <i class="bi bi-calendar" style="font-size:14px;"></i>
                                    <span>02/11/2025</span>
                                </span>
                            </p>
                        </summary>
                        <div class="mt-3 pt-3 border-top">
                            <p class="card-text">
                                Tanto CSS Grid como Flexbox son herramientas poderosas para el diseño web.<br>
                                Grid es ideal para layouts bidimensionales, mientras que Flexbox brilla en disposiciones lineales.
                            </p>
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>

</div>