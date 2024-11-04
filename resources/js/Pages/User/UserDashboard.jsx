import React, { useState, useEffect } from 'react';
import User from '@/Layouts/User';
import UserMenu from '@/Layouts/UserMenu';
import Path from './Shared/Path';
import InfoCard from './Shared/InfoCard';
import ListCard from './Shared/ListCard';
import Swal from 'sweetalert2';
import { router } from '@inertiajs/react';

const UserDashboard = (props) =>{

    const [uid, setUid] = useState(props.auth.user.id);
    const [listing, setListing] = useState(props.listing);

    const removeListing = (id) =>{
        Swal.fire({
            title: 'Are you sure want to Delete?',icon: 'warning',showCancelButton: true, confirmButtonText: 'Yes, delete!'
          }).then((result) => {
            if (result.isConfirmed) {
                router.delete(route('listing.destroy', id),{
                    onSuccess: () => {
                        setListing((list)=>{
                            return list.filter(list => list.id != id);
                        })
                        Swal.fire('Deleted!','Listing Removed Successfully','success');
                    },
                    preserveState:true
                });
            }
          })
    }

    return (
        <User>
           <Path title="Dashboard" />
           <div className="container-fluid user-container">
                <div className="container">
                    <div className="row">
                        <div className="col-md-3">
                            <UserMenu user={props.auth.user} />
                        </div>
                        
                        <div className="col-md-9">
                            <div className="user-info">
                              
                                <div className="row">
                                    <InfoCard icon="bi-card-checklist" count={props.count.listing} title="Total Active Listing" />
                                    <InfoCard icon="bi-star-half" count={props.count.review} title="Total Reviews" />
                                    <InfoCard icon="bi-chat-left-text" count={props.count.message} title=" Message Received" />
                                </div>
                        
                            </div>
                            <div className="list-title">
                                <h4 className='mb-0 pb-0 pt-3 mt-1 fs-6'>Recent Listings</h4>
                            </div>
                            <div className="latest-reviews business-listing">
                                {
                                    listing && listing.map((l, i)=>{
                                        return  <ListCard key={i} uid={uid} list={l} removeListing={removeListing} />
                                    })
                                } 
                                {
                                    listing.length >= 2 && <div className="view-more-btn text-end">
                                                                <a href={route('my-listing')}>
                                                                     <button  type="button" className="btn btn-sm btn-outline-primary">View All Listings</button>
                                                                </a> 
                                                        </div>
                                }
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </User>
        
    )
}
export default UserDashboard