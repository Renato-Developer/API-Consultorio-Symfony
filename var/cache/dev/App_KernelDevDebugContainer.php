<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container1aiKBjL\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container1aiKBjL/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/Container1aiKBjL.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\Container1aiKBjL\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \Container1aiKBjL\App_KernelDevDebugContainer([
    'container.build_hash' => '1aiKBjL',
    'container.build_id' => 'cf7abb25',
    'container.build_time' => 1626573618,
], __DIR__.\DIRECTORY_SEPARATOR.'Container1aiKBjL');
