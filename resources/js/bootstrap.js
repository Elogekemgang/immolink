Echo.private('conversation.' + conversationId)
    .listen('MessageSent', (e) => {
        // Ajouter automatiquement le nouveau message
        // sans recharger la page
    });