/**
 * Section Configuration Data
 * This file initializes the section data that is used by the content section JavaScript
 */

// Make functions accessible globally for inline script usage
window.sectionConfigUtils = {
    /**
     * Initialize section data
     */
    initializeSectionData(sectionName, categoriesData, csrfToken, routeConfig = {}) {
        window.sectionData = {
            section: sectionName,
            categories: categoriesData,
            csrfToken: csrfToken,
            adminContentBaseUrl: routeConfig.adminContentBaseUrl || '',
            storageBaseUrl: routeConfig.storageBaseUrl || '',
        };
    },

    /**
     * Get section data from window object
     */
    getSectionData() {
        return window.sectionData || {};
    },

    /**
     * Get category by key from section data
     */
    getCategoryByKey(categoryKey) {
        const data = window.sectionConfigUtils.getSectionData();
        return data.categories?.find(cat => cat.key === categoryKey) || null;
    }
};

function initializeSectionDataFromDom() {
    const dataElement = document.getElementById('section-data');
    if (!dataElement || !window.sectionConfigUtils) {
        return;
    }

    let categories = [];
    try {
        categories = JSON.parse(dataElement.dataset.categories || '[]');
    } catch (error) {
        console.error('Failed to parse section categories data:', error);
    }

    window.sectionConfigUtils.initializeSectionData(
        dataElement.dataset.section || '',
        categories,
        dataElement.dataset.csrfToken || '',
        {
            adminContentBaseUrl: dataElement.dataset.adminContentBaseUrl || '',
            storageBaseUrl: dataElement.dataset.storageBaseUrl || '',
        }
    );
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializeSectionDataFromDom);
} else {
    initializeSectionDataFromDom();
}
