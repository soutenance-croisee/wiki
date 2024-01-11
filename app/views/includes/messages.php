<?php if (isset($_SESSION['message'])): ?>
<?php
    $messageType = $_SESSION['message']['type'];
    $bgColorClass = $messageType === 'error' ? 'bg-red-100' : 'bg-green-100';
    $borderColorClass = $messageType === 'error' ? 'border-red-400' : 'border-green-400';
    $textColorClass = $messageType === 'error' ? 'text-red-800' : 'text-green-800';
    ?>
<div class="<?php echo $bgColorClass; ?> border-b <?php echo $borderColorClass; ?> text-sm p-4 flex justify-between mt-1"
    id="MessageContainerId">
    <div>
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd" />
            </svg>
            <p class="<?php echo $textColorClass; ?>">
                <span class="font-bold">Info:</span>
                <?php echo $_SESSION['message']['text']; ?>
            </p>
        </div>
    </div>
    <div>
        <svg onclick="dismissMessage()" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </div>
</div>
<?php unset($_SESSION['message']); // Clear the message after displaying ?>
<?php endif; ?>