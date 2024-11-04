import React from 'react';
import { usePage } from '@inertiajs/react';
import { Link } from '@inertiajs/react';



export default function UserMenu({ children, user }) {
    let token = document.head.querySelector('meta[name="csrf-token"]');
    const { url, component } = usePage()
   
    return (
        <div className="side-card mb-5">
            <div className="row user-prof">
                <div className="image col-3">
                    <Link href={route('profile')}>
                        <img src={user.resize} alt="" />
                    </Link>
                    
                </div>
                <div className="col-9 detail">
                <h6>{ user.name }</h6>
                <p>Status <span>Online</span></p>
                </div>
            </div>
            <div className="row user-menu">
                <ul className="no-padding">
                <Link href={route('user-dashboard')}>
                    <li className={component == 'User/UserDashboard' ? 'act' : ''}><i className="bi bi-speedometer2"></i> Dashboard</li>
                </Link>
                
                <Link href={route('my-listing')}>
                    <li className={component == 'User/MyListing' ? 'act' : ''}><i className="bi bi-list-stars"></i> My Listings</li>
                </Link>
                <Link href={route('listing.create')}>
                    <li ><i className="bi bi-plus-square"></i> New Listing</li>
                </Link>
                <Link href={route('bookmarks')}>
                    <li className={component == 'User/Bookmarks' ? 'act' : ''}><i className="bi bi-heart"></i> Bookmarks</li>
                </Link>
                <Link href={route('reviews')}>
                    <li className={component == 'User/Reviews' ? 'act' : ''}><i className="bi bi-star"></i> Reviews</li>
                </Link>
                <Link href={route('user-messages')}>
                    <li className={component == 'User/UserMessages' ? 'act' : ''}><i className="bi bi-chat-square-text"></i> Messages</li>
                </Link>
                <Link href={route('active-plan')}>
                    <li className={component == 'User/Plan' ? 'act' : ''}><i className="bi bi-credit-card-2-front"></i> Active Plan</li>
                </Link>
                <Link href={route('payments')}>
                    <li className={component == 'User/Payments' ? 'act' : ''}><i className="bi bi-credit-card-2-back"></i> Payments</li>
                </Link>
                <Link href={route('profile')}>
                    <li className={component == 'User/Profile' ? 'act' : ''}><i className="bi bi-person"></i>User Profile</li>
                </Link>
                <Link href={route('user-import')}>
                    <li className={component == 'User/Import' ? 'act' : ''}><i className="bi bi-upload"></i>Import Data</li>
                </Link>
                <a href={route('export-user-data')}>
                    <li ><i className="bi bi-file-earmark-excel"></i>Export Data</li>
                </a>
                <Link href={route('user-settings')}>
                    <li className={component == 'User/UserSettings' ? 'act' : ''}><i className="bi bi-gear"></i> Account Settings</li>
                </Link>
                <form  method="post" action={route('logout')}  >
                    <li>
                        <input type="hidden" value={token.content} name="_token" />
                        <button className="clearbtn"><i className="bi bi-box-arrow-in-left"></i> Log Out</button> 
                    </li>
                </form>
                </ul>
            </div>
            
        </div>
    );
}




