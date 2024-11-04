import React, { useState } from 'react';
import { Link } from '@inertiajs/react';
import AdminMenu from './AdminMenu';


export default function Authenticated({ auth, children, current }) {
    const [showingNavigationDropdown, setShowingNavigationDropdown] = useState(false);

    const showMenu = () =>{
         var x = document.getElementById("slidrr");
         if (x.style.display === "block") {
            x.style.display = "none";
         } else {
            x.style.display = "block";
         }
    }

    return (
        <div className="container-fluid h-100">
         <div className="row no-margin h-100">
         
            <AdminMenu />

            <div id="content" className="right-part">
             
               <div className="right-header">
                  <ul className="left-ul">
                     <li className="nav-item d-lg-none">
                        <a  onClick={showMenu} id="collapseExample" data-bs-toggle="collapse" className="nav-link cp toggle-menu" aria-expanded="false" aria-controls="collapseExample">
                           <i className="bi fs-2 bi-list"></i>
                        </a>
                     </li>
                   
                  </ul>
                  <ul className="right-ul">
                     <li>
                        <a className="dropdown-toggle" href="#" id="dropdownMenuLink-3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img className="kijhj" src={auth.user.resize} alt="" />
                        
                        </a>
                      

                        <div className="dropdown-menu user-details" aria-labelledby="dropdownMenuLink-3">
                           <ul className="list-group">
                              <li className="list-group-item user-info list-title d-flex justify-content-between align-items-center">
                                 <a href="">
                                    <div className="media">
                                       <div className="avatar">
                                          <img className="align-self-start mr-3 " src={auth.user.resize} alt="user avatar" />
                                       </div>
                                       <div className="media-body">
                                          <h6 className="mt-2 user-title">{auth.user.name}</h6>
                                          <p className="user-subtitle">{auth.user.email}</p>
                                       </div>
                                    </div>
                                 </a>
                              </li>
                              <li className="">
                                 <a href={route('app-settings.index')}>
                                 <i className="bx bx-slider  mr-2"></i> App Settings
                                 </a>
                              </li>
                              <li className="">
                                 <a href={route('password-settings')}>       
                                 <i className="bx bx-wrench  mr-2"></i> Password Settings
                                 </a>
                              </li>
                              <li className="">
                                <Link className="clearbtn" method="post" href={route('admin-logout')} as="button"> 
                                   &nbsp; Log Out
                                </Link>
                              </li>
                           </ul>
                        </div>
                     </li>
                  </ul>
               </div>
               

               <div  className="content-container">
           
                { children }
                
                </div>
           
           
            </div>
         </div>
      </div>
    );
}
