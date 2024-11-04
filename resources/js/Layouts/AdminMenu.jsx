import React, { useState } from 'react';
import { Link, usePage } from '@inertiajs/react';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink';
import logo from './../../../storage/app/public/assets/admin/images/logo.png'


const AdminMenu = () =>{
    
    const { url, component } = usePage()

    return (
        <div id="slidrr" className="teft-part">
            <div className="logo-part">
                <a href={route('dashboard')}>
                <img src={logo} alt="" />
                </a>
            </div>
            <nav className='nav-div' data-simplebar  id="nav-div">
                <ul >
                    
                    <ResponsiveNavLink icon="bi bi-speedometer2" text="Dashboard" link={ route('dashboard') } className="bottom-line" active="Admin/Dashboard" />

                    <ResponsiveNavLink icon="bi bi-boxes" text="Manage Category" link={ route('category.create') } className="bottom-line" active="Admin/Category" />

                    <ResponsiveNavLink icon="bi bi-geo-alt" text="Manage Locations" link={ route('location.create') } className="bottom-line" active="Admin/Location" />
                   
                    <ResponsiveNavLink icon="bi bi-briefcase" text="Manage Listing" link={ route('/') } className="bottom-line" active="Admin/Listing" id="listing">
                        <Link href={ route('admin/view-all-listing') }> <li><i className="bi vk bi-caret-right-fill"></i>All Listings</li></Link>
                        <Link href={ route('admin/bulk-import') }> <li><i className="bi vk bi-caret-right-fill"></i>Import Data</li></Link>
                        <Link href={ route('claim.view') }> <li><i className="bi vk bi-caret-right-fill"></i>Ownership Request</li></Link>
                    </ResponsiveNavLink>
                    
                    <ResponsiveNavLink icon="bi bi-people" text="Manage Users" link={ route('admin/view-users') } className="bottom-line" active="Admin/User" />
                   
                    <ResponsiveNavLink icon="bi bi-briefcase" text="Packages" link={ route('/') } className="bottom-line" active="Admin/Package" id="pack">
                        <Link href={ route('package.create') }><li><i className="bi vk bi-caret-right-fill"></i>Add Package</li></Link>
                        <Link href={ route('package.index') }> <li><i className="bi vk bi-caret-right-fill"></i>Manage Package</li></Link>
                    </ResponsiveNavLink>
                   
                    <ResponsiveNavLink icon="bi bi-chat-left-text" text="Messages" link={ route('admin/viewMessages') } className="bottom-line" active="Admin/Message" >
                    </ResponsiveNavLink>

                    <ResponsiveNavLink icon="bi bi-newspaper" text="Manage Blog" link='' className="bottom-line" active="Admin/Blog" id="blog">
                        <Link  href={route('blog.create')}><li><i className="bi vk bi-caret-right-fill"></i> Add Blog</li></Link>
                        <Link  href={route('blog.index')}><li><i className="bi vk bi-caret-right-fill"></i> View Blog</li></Link>
                    </ResponsiveNavLink>

                    <ResponsiveNavLink icon="bi bi-file-earmark-break" text="Manage Pages" link='' className="bottom-line" active="Admin/Page" id="page">
                        <Link  href={route('pages.create')}><li><i className="bi vk bi-caret-right-fill"></i> Add Page</li></Link>
                        <Link  href={route('pages.index')}><li><i className="bi vk bi-caret-right-fill"></i> View Page</li></Link>
                    </ResponsiveNavLink>

                    <ResponsiveNavLink icon="bi bi-arrow-left-right" text="Payments" link='' className="bottom-line" active="Admin/Payment" id="payment">
                        <Link  href={route('admin/payment-history')}><li><i className="bi vk bi-caret-right-fill"></i> Payment History</li></Link>
                        <Link  href={route('admin/transaction-history')}><li><i className="bi vk bi-caret-right-fill"></i> Transaction History</li></Link>
                    </ResponsiveNavLink>

                    <ResponsiveNavLink icon="bi bi-trash" text="Trash" link='' className="bottom-line" active="Admin/Trash" id="trash">
                        <Link  href={route('admin/view-trashed-users')}><li><i className="bi vk bi-caret-right-fill"></i> User Trash</li></Link>
                        <Link href={route('admin/view-trash-listing')}><li><i className="bi vk bi-caret-right-fill"></i> Business Trash</li></Link>
                    </ResponsiveNavLink>

                    <ResponsiveNavLink icon="bi bi-people" text="Subscribers" link={ route('subscriber.index') } className="bottom-line" active="Admin/Subscriber" />

                    <ResponsiveNavLink icon="bi bi-gear" text="Settings" link='' className="bottom-line" active="Admin/Settings" id="setting">
                        <Link  href={route('siteinfo.create')}><li><i className="bi vk bi-caret-right-fill"></i> Site Info</li></Link>
                        <Link href={route('app-settings.index')}><li><i className="bi vk bi-caret-right-fill"></i> App Settings</li></Link>
                        <Link href={route('payment-gateway.index')}><li><i className="bi vk bi-caret-right-fill"></i> Payment Gateway</li></Link>
                        <Link href={route('password-settings')}> <li><i className="bi vk bi-caret-right-fill"></i> Password Settings </li></Link>
                    </ResponsiveNavLink>
                   
                    
                    <li className="bottom-line ">
                        <i className="bi bi-box-arrow-in-left"></i>
                        <Link method="post" href={route('admin-logout')} className="clearbtn" as="button">
                            Log Out
                        </Link>
                    </li>
                    
                </ul>
                
            </nav>
            <div className="footer-admin  align-items-end row">
                    <p>Copyright @ 2022 <a href="https://smarteyeapps.com">Smarteyeapps</a> </p>
                </div>
        </div>
    )
}
export default AdminMenu