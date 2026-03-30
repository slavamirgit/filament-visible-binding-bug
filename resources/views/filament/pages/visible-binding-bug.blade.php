<x-filament-panels::page>
    <div class="mb-4 text-sm">
        <p><strong>Reproduction steps:</strong></p>
        <ol class="list-decimal pl-5 space-y-1">
            <li>Select <strong>Mode 1</strong>.</li>
            <li>Enter a value into <strong>Field 1</strong> and blur the field.</li>
            <li>Confirm that <strong>Field 1 Data</strong> updates.</li>
            <li>Switch to <strong>Mode 2</strong>.</li>
            <li>Enter a value into <strong>Field 2</strong> and blur the field.</li>
            <li>Observe that <strong>Field 2 Data</strong> does not update.</li>
            <li>Switch back to <strong>Mode 1</strong> and repeat.</li>
            <li>Switch again to <strong>Mode 2</strong> and repeat.</li>
        </ol>
    </div>

    {{ $this->form }}
</x-filament-panels::page>
