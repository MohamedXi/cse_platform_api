<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerI3TJNlu\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerI3TJNlu/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerI3TJNlu.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerI3TJNlu\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerI3TJNlu\App_KernelDevDebugContainer([
    'container.build_hash' => 'I3TJNlu',
    'container.build_id' => 'a1f86234',
    'container.build_time' => 1655882312,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerI3TJNlu');
