import React from 'react';
import { Helmet } from 'react-helmet-async';
import { useSettings } from '../context/SettingsContext';
import { API_BASE_URL } from '../utils/api';

const SEO = ({ title, description, keywords, name, type }) => {
    const { settings } = useSettings();
    const siteName = settings?.schoolName || 'University Management System';
    const faviconUrl = settings?.schoolFavicon ? `${API_BASE_URL}${settings.schoolFavicon}` : '/vite.svg';
    
    return (
        <Helmet>
            {/* Standard metadata tags */}
            <title>{title ? `${title} | ${siteName}` : siteName}</title>
            <meta name='description' content={description || `Welcome to ${siteName}`} />
            <meta name='keywords' content={keywords || 'university, management system, education, portal, tms'} />
            
            {/* Favicon */}
            <link rel="icon" href={faviconUrl} />

            {/* OpenGraph tags */}
            <meta property='og:title' content={title ? `${title} | ${siteName}` : siteName} />
            <meta property='og:description' content={description || `Welcome to ${siteName}`} />
            <meta property='og:type' content={type || 'website'} />
            <meta property='og:site_name' content={siteName} />
            
            {/* Twitter tags */}
            <meta name='twitter:creator' content={name || siteName} />
            <meta name='twitter:card' content='summary_large_image' />
            <meta name='twitter:title' content={title ? `${title} | ${siteName}` : siteName} />
            <meta name='twitter:description' content={description || `Welcome to ${siteName}`} />
        </Helmet>
    );
};

export default SEO;
