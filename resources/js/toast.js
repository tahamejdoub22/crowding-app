class ToastManager {
    constructor() {
        this.container = null;
        this.init();
    }

    init() {
        // Create toast container if it doesn't exist
        if (!document.getElementById('toast-container')) {
            this.container = document.createElement('div');
            this.container.id = 'toast-container';
            this.container.className = 'fixed top-4 right-4 z-50 space-y-4';
            document.body.appendChild(this.container);
        } else {
            this.container = document.getElementById('toast-container');
        }
    }

    show(options = {}) {
        const defaultOptions = {
            type: 'success',
            title: '',
            message: '',
            duration: 5000,
            closeable: true,
            icon: true
        };

        const config = { ...defaultOptions, ...options };
        
        const toast = this.createToast(config);
        this.container.appendChild(toast);

        // Auto remove after duration
        if (config.duration > 0) {
            setTimeout(() => {
                this.remove(toast);
            }, config.duration);
        }

        return toast;
    }

    createToast(config) {
        const toast = document.createElement('div');
        toast.className = 'toast-item transform transition-all duration-300 ease-in-out translate-x-full opacity-0';
        
        const typeClasses = {
            success: 'bg-green-50 border-green-200 text-green-800',
            error: 'bg-red-50 border-red-200 text-red-800',
            warning: 'bg-yellow-50 border-yellow-200 text-yellow-800',
            info: 'bg-blue-50 border-blue-200 text-blue-800',
        };

        const iconColors = {
            success: 'text-green-400',
            error: 'text-red-400',
            warning: 'text-yellow-400',
            info: 'text-blue-400',
        };

        const icons = {
            success: `<svg class="w-6 h-6 ${iconColors[config.type]}" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                      </svg>`,
            error: `<svg class="w-6 h-6 ${iconColors[config.type]}" fill="currentColor" viewBox="0 0 20 20">
                     <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                   </svg>`,
            warning: `<svg class="w-6 h-6 ${iconColors[config.type]}" fill="currentColor" viewBox="0 0 20 20">
                       <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                     </svg>`,
            info: `<svg class="w-6 h-6 ${iconColors[config.type]}" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                  </svg>`
        };

        toast.innerHTML = `
            <div class="bg-white rounded-xl shadow-xl border-2 ${typeClasses[config.type]} p-4 max-w-sm w-full">
                <div class="flex items-start">
                    ${config.icon ? `<div class="flex-shrink-0 mr-3">${icons[config.type]}</div>` : ''}
                    <div class="flex-1 min-w-0">
                        ${config.title ? `<h4 class="text-sm font-semibold mb-1">${config.title}</h4>` : ''}
                        ${config.message ? `<p class="text-sm">${config.message}</p>` : ''}
                    </div>
                    ${config.closeable ? `
                        <div class="flex-shrink-0 ml-3">
                            <button class="toast-close inline-flex rounded-md p-1.5 hover:bg-black/5 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-primary-500 transition-colors">
                                <span class="sr-only">Dismiss</span>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </div>
                    ` : ''}
                </div>
            </div>
        `;

        // Add click handler for close button
        if (config.closeable) {
            const closeBtn = toast.querySelector('.toast-close');
            closeBtn.addEventListener('click', () => this.remove(toast));
        }

        // Show toast with animation
        setTimeout(() => {
            toast.classList.remove('translate-x-full', 'opacity-0');
            toast.classList.add('translate-x-0', 'opacity-100');
        }, 10);

        return toast;
    }

    remove(toast) {
        if (toast && toast.parentNode) {
            toast.classList.add('translate-x-full', 'opacity-0');
            setTimeout(() => {
                if (toast.parentNode) {
                    toast.parentNode.removeChild(toast);
                }
            }, 300);
        }
    }

    success(message, title = '') {
        return this.show({
            type: 'success',
            title,
            message
        });
    }

    error(message, title = '') {
        return this.show({
            type: 'error',
            title,
            message
        });
    }

    warning(message, title = '') {
        return this.show({
            type: 'warning',
            title,
            message
        });
    }

    info(message, title = '') {
        return this.show({
            type: 'info',
            title,
            message
        });
    }

    clear() {
        const toasts = this.container.querySelectorAll('.toast-item');
        toasts.forEach(toast => this.remove(toast));
    }
}

// Create global instance
window.Toast = new ToastManager();

// Export for module usage
export default ToastManager;