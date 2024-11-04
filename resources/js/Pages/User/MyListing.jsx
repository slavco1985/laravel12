import React, { useState, useEffect } from 'react';
import User from '@/Layouts/User';
import UserMenu from '@/Layouts/UserMenu';
import Path from './Shared/Path';
import ListCard from './Shared/ListCard';
import Pagination from '@/Core/Pagination';

const MyListing = (props) =>{

    const [uid, setUid] = useState(props.auth.user.id);
    const [listing, setListing] = useState(props.listing.data);
    const [links, setLinks] = useState(props.listing.links);

    const removeListing = (id) =>{
        Swal.fire({
            title: 'Are you sure want to Delete?',icon: 'warning',showCancelButton: true, confirmButtonText: 'Yes, delete!'
          }).then((result) => {
            if (result.isConfirmed) {
                Inertia.delete(route('listing.destroy', id),{
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
           <Path title="My Listings" />
                <div className="container-fluid user-container">
                        <div className="container">
                            <div className="row">
                                <div className="col-md-3">
                                    <UserMenu user={props.auth.user} />
                                </div>
                                
                                <div className="col-md-9">
                                    <div className="latest-reviews business-listing">
                                        {
                                            listing && listing.map((l, i)=>{
                                                return  <ListCard key={i} uid={uid} list={l} removeListing={removeListing} />
                                            })
                                        } 
                                   
                                        { links.length === 3 ? '' :
                                            <div className="card-footer">
                                                <div className="row">
                                                    <div className="col-md-6 pt-2">
                                                        
                                                    </div>
                                                    <div className="col-md-6 d-flex justify-content-end">
                                                        <Pagination links={links} />
                                                    </div>
                                                </div>
                                                
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
export default MyListing