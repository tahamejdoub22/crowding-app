/**
 * Projects Listing - API Integration & Dynamic Features
 * Provides real-time data fetching and enhanced user interactions
 */

class ProjectsManager {
    constructor() {
        this.apiBaseUrl = '/api/projects';
        this.currentPage = 1;
        this.isLoading = false;
        this.filters = {
            search: '',
            category: '',
            status: '',
            sort: 'created_at',
            order: 'desc'
        };

        this.init();
    }

    init() {
        // Only initialize if we're on a page that has project elements
        const projectContainer = document.querySelector('#projects-grid');
        if (!projectContainer) {
            console.log('Projects container not found, skipping ProjectsManager initialization');
            return;
        }

        this.bindEvents();
        this.setupInfiniteScroll();
        this.setupSearchDebounce();
        
        // Initial load of projects
        this.fetchProjects(true);
    }

    bindEvents() {
        // Filter form submission
        document.addEventListener('submit', (e) => {
            if (e.target.matches('#projects-filter-form')) {
                e.preventDefault();
                this.handleFilterSubmit(e.target);
            }
        });

        // Real-time search
        const searchInput = document.querySelector('input[name="search"]');
        if (searchInput) {
            searchInput.addEventListener('input', this.debounce((e) => {
                this.filters.search = e.target.value;
                this.fetchProjects(true);
            }, 500));
        }

        // Filter dropdowns
        document.querySelectorAll('select[name="category"], select[name="status"], select[name="sort"]').forEach(select => {
            select.addEventListener('change', (e) => {
                this.filters[e.target.name] = e.target.value;
                this.fetchProjects(true);
            });
        });

        // Project card interactions
        document.addEventListener('click', (e) => {
            // Like/unlike project
            if (e.target.matches('.project-like-btn')) {
                e.preventDefault();
                this.toggleProjectLike(e.target);
            }

            // Quick view modal
            if (e.target.matches('.project-quick-view')) {
                e.preventDefault();
                this.showProjectQuickView(e.target.dataset.projectId);
            }
        });
    }

    handleFilterSubmit(form) {
        const formData = new FormData(form);
        
        this.filters = {
            search: formData.get('search') || '',
            category: formData.get('category') || '',
            status: formData.get('status') || '',
            sort: formData.get('sort') || 'created_at',
            order: formData.get('order') || 'desc'
        };

        this.fetchProjects(true);
    }

    async fetchProjects(resetPage = false) {
        if (this.isLoading) return;

        this.isLoading = true;
        this.showLoadingState();

        if (resetPage) {
            this.currentPage = 1;
        }

        try {
            const params = new URLSearchParams({
                ...this.filters,
                page: this.currentPage,
                per_page: 12
            });

            const response = await fetch(`${this.apiBaseUrl}?${params}`, {
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                }
            });

            if (!response.ok) {
                const errorText = await response.text();
                console.error('API Response Error:', {
                    status: response.status,
                    statusText: response.statusText,
                    url: response.url,
                    body: errorText
                });
                throw new Error(`API Error ${response.status}: ${response.statusText}`);
            }

            const data = await response.json();
            console.log('API Response:', data); // Debug log
            
            if (data.status === 'success') {
                const projects = data.data.data || data.data; // Handle both paginated and direct array responses
                
                if (resetPage) {
                    this.replaceProjects(projects);
                } else {
                    this.appendProjects(projects);
                }
                
                this.updatePagination(data.data);
                this.updateResultsCount(data.data);
            }

        } catch (error) {
            console.error('Error fetching projects:', error);
            
            // Show user-friendly toast notification if available
            if (window.Toast) {
                window.Toast.error('Failed to fetch projects', 'Please check your connection and try again');
            }
            
            this.showErrorState(error);
        } finally {
            this.isLoading = false;
            this.hideLoadingState();
        }
    }

    replaceProjects(projects) {
        const container = document.querySelector('#projects-grid');
        if (!container) return;

        if (projects.length === 0) {
            container.innerHTML = this.getEmptyState();
            return;
        }

        container.innerHTML = projects.map(project => this.renderProjectCard(project)).join('');
        this.animateProjectCards();
    }

    appendProjects(projects) {
        const container = document.querySelector('#projects-grid');
        if (!container) return;

        const newCards = projects.map(project => this.renderProjectCard(project)).join('');
        container.insertAdjacentHTML('beforeend', newCards);
        this.animateProjectCards();
    }

    renderProjectCard(project) {
        const fundingPercentage = project.goal > 0 ? Math.min((project.pledged / project.goal) * 100, 100) : 0;
        const daysLeft = this.calculateDaysLeft(project.end_date);
        const isActive = new Date(project.end_date) > new Date();
        const isNew = new Date(project.created_at) > new Date(Date.now() - 7 * 24 * 60 * 60 * 1000);

        return `
            <div class="project-card bg-white rounded-2xl shadow-sm hover:shadow-lg transition-all duration-300 overflow-hidden group" data-project-id="${project.id}">
                <div class="relative overflow-hidden aspect-video">
                    <img 
                        src="${project.image ? '/image/' + project.image : '/images/project-placeholder.jpg'}" 
                        alt="${this.escapeHtml(project.project_name)}"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        loading="lazy"
                    >
                    
                    <div class="absolute top-4 left-4 flex flex-wrap gap-2">
                        ${isNew ? '<span class="px-2 py-1 bg-green-500 text-white text-xs font-semibold rounded-full">New</span>' : ''}
                        ${fundingPercentage >= 100 ? '<span class="px-2 py-1 bg-primary-500 text-white text-xs font-semibold rounded-full">Funded</span>' : ''}
                        ${!isActive ? '<span class="px-2 py-1 bg-gray-500 text-white text-xs font-semibold rounded-full">Ended</span>' : ''}
                    </div>

                    <div class="absolute top-4 right-4">
                        <button class="project-like-btn w-8 h-8 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center hover:bg-white transition-colors" data-project-id="${project.id}">
                            <svg class="w-4 h-4 text-gray-600 hover:text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </button>
                    </div>

                    <div class="absolute bottom-4 left-4 flex items-center">
                        <div class="w-8 h-8 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center">
                            <span class="text-xs font-semibold text-gray-700">
                                ${project.user?.name?.charAt(0).toUpperCase() || 'U'}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    <div class="mb-4">
                        <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 group-hover:text-primary-600 transition-colors">
                            <a href="/project/${project.id}" class="project-link">
                                ${this.escapeHtml(project.project_name)}
                            </a>
                        </h3>
                        
                        <div class="flex items-center text-sm text-gray-500 mb-2">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            ${this.escapeHtml(project.project_location)}
                        </div>

                        <p class="text-gray-600 text-sm line-clamp-2">
                            ${this.escapeHtml(this.truncate(project.project_description, 100))}
                        </p>
                    </div>

                    <div class="mb-4">
                        <div class="w-full bg-gray-200 rounded-full h-2 mb-3">
                            <div 
                                class="bg-gradient-to-r from-primary-500 to-primary-600 h-2 rounded-full transition-all duration-300"
                                style="width: ${fundingPercentage}%"
                            ></div>
                        </div>

                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div>
                                <div class="font-bold text-gray-900">
                                    $${this.formatNumber(project.pledged)}
                                </div>
                                <div class="text-gray-500">pledged</div>
                            </div>
                            <div>
                                <div class="font-bold text-gray-900">
                                    ${Math.round(fundingPercentage)}%
                                </div>
                                <div class="text-gray-500">funded</div>
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-gray-100 pt-4">
                        <div class="grid grid-cols-3 gap-2 text-center text-sm">
                            <div>
                                <div class="font-semibold text-gray-900">
                                    $${this.formatNumber(project.goal)}
                                </div>
                                <div class="text-gray-500 text-xs">goal</div>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900">
                                    ${this.formatNumber(project.investors)}
                                </div>
                                <div class="text-gray-500 text-xs">backers</div>
                            </div>
                            <div>
                                <div class="font-semibold ${isActive ? 'text-gray-900' : 'text-red-500'}">
                                    ${isActive ? Math.abs(daysLeft) : 'Ended'}
                                </div>
                                <div class="text-gray-500 text-xs">
                                    ${isActive ? 'days left' : ''}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-gray-100 pt-4 mt-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-sm text-gray-600">
                                <span class="mr-1">by</span>
                                <span class="font-medium text-gray-900">
                                    ${project.user?.name || 'Unknown Creator'}
                                </span>
                            </div>
                            <div class="text-xs text-gray-400">
                                ${this.formatDate(project.created_at)}
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 space-y-2">
                        <a href="/project/${project.id}" class="w-full btn btn-primary btn-small text-center">
                            View Project
                        </a>
                        
                        <button class="w-full btn btn-outline btn-small project-quick-view" data-project-id="${project.id}">
                            Quick View
                        </button>
                    </div>
                </div>
            </div>
        `;
    }

    setupInfiniteScroll() {
        let ticking = false;
        
        window.addEventListener('scroll', () => {
            if (!ticking) {
                requestAnimationFrame(() => {
                    if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 1000) {
                        this.loadMoreProjects();
                    }
                    ticking = false;
                });
                ticking = true;
            }
        });
    }

    async loadMoreProjects() {
        if (this.isLoading) return;
        
        this.currentPage++;
        await this.fetchProjects(false);
    }

    setupSearchDebounce() {
        this.debounceTimer = null;
    }

    debounce(func, wait) {
        return (...args) => {
            clearTimeout(this.debounceTimer);
            this.debounceTimer = setTimeout(() => func.apply(this, args), wait);
        };
    }

    async toggleProjectLike(button) {
        const projectId = button.dataset.projectId;
        const icon = button.querySelector('svg');
        
        try {
            const response = await fetch(`/api/projects/${projectId}/like`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
                }
            });

            if (response.ok) {
                const data = await response.json();
                if (data.liked) {
                    icon.setAttribute('fill', 'currentColor');
                    icon.classList.add('text-red-500');
                } else {
                    icon.setAttribute('fill', 'none');
                    icon.classList.remove('text-red-500');
                }
            }
        } catch (error) {
            console.error('Error toggling like:', error);
        }
    }

    showProjectQuickView(projectId) {
        // Implementation for quick view modal
        console.log('Show quick view for project:', projectId);
    }

    showLoadingState() {
        const container = document.querySelector('#projects-grid');
        if (!container) return;

        // Add loading spinner or skeleton cards
        container.classList.add('loading');
    }

    hideLoadingState() {
        const container = document.querySelector('#projects-grid');
        if (!container) return;

        container.classList.remove('loading');
    }

    showErrorState(error = null) {
        const container = document.querySelector('#projects-grid');
        if (!container) return;

        let errorMessage = 'We couldn\'t load the projects. Please try again.';
        
        if (error && error.message) {
            if (error.message.includes('Failed to fetch')) {
                errorMessage = 'Network error. Please check your internet connection.';
            } else if (error.message.includes('404')) {
                errorMessage = 'API endpoint not found. Please contact support.';
            } else if (error.message.includes('500')) {
                errorMessage = 'Server error. Please try again later.';
            }
        }

        container.innerHTML = `
            <div class="col-span-full text-center py-16">
                <div class="max-w-md mx-auto">
                    <div class="w-24 h-24 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Oops! Something went wrong</h3>
                    <p class="text-gray-600 mb-6">${errorMessage}</p>
                    <div class="space-x-4">
                        <button onclick="projectsManager.fetchProjects(true)" class="btn btn-primary">Try Again</button>
                        <button onclick="location.reload()" class="btn btn-outline">Refresh Page</button>
                    </div>
                </div>
            </div>
        `;
    }

    getEmptyState() {
        return `
            <div class="col-span-full text-center py-16">
                <div class="max-w-md mx-auto">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">No projects found</h3>
                    <p class="text-gray-600 mb-6">Try adjusting your search criteria or browse all projects.</p>
                    <button onclick="window.projectsManager.clearFilters()" class="btn btn-primary">Clear Filters</button>
                </div>
            </div>
        `;
    }

    clearFilters() {
        this.filters = {
            search: '',
            category: '',
            status: '',
            sort: 'created_at',
            order: 'desc'
        };

        // Reset form inputs
        document.querySelector('input[name="search"]').value = '';
        document.querySelectorAll('select').forEach(select => {
            select.value = '';
        });

        this.fetchProjects(true);
    }

    animateProjectCards() {
        const cards = document.querySelectorAll('.project-card:not(.animated)');
        cards.forEach((card, index) => {
            card.classList.add('animated');
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                card.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 100);
        });
    }

    updatePagination(paginationData) {
        // Update pagination if exists
        const pagination = document.querySelector('.pagination-info');
        if (pagination) {
            pagination.textContent = `Page ${paginationData.current_page} of ${paginationData.last_page}`;
        }
    }

    updateResultsCount(paginationData) {
        const resultsCount = document.querySelector('.results-count');
        if (resultsCount) {
            resultsCount.textContent = `Showing ${paginationData.data.length} of ${paginationData.total} projects`;
        }
    }

    // Utility functions
    calculateDaysLeft(endDate) {
        const end = new Date(endDate);
        const now = new Date();
        const diffTime = end - now;
        return Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    }

    formatNumber(num) {
        return new Intl.NumberFormat().format(num);
    }

    formatDate(date) {
        return new Date(date).toLocaleDateString('en-US', { 
            month: 'short', 
            day: 'numeric', 
            year: 'numeric' 
        });
    }

    escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    truncate(str, length) {
        return str.length > length ? str.substring(0, length) + '...' : str;
    }
}

// Initialize the projects manager when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    window.projectsManager = new ProjectsManager();
});

export default ProjectsManager;