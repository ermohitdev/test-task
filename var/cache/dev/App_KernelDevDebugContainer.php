<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerXXd7hOd\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerXXd7hOd/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerXXd7hOd.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerXXd7hOd\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerXXd7hOd\App_KernelDevDebugContainer([
    'container.build_hash' => 'XXd7hOd',
    'container.build_id' => '9cfc8711',
    'container.build_time' => 1673929502,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerXXd7hOd');
