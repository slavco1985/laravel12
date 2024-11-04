import React, { useEffect, useState } from 'react';
import Authenticated from '@/Layouts/Authenticated';
import PageTitle from '@/Components/PageTitle';
import Panel from '@/Components/Panel';
import Pagination from '@/Core/Pagination';
import Swal from 'sweetalert2';
import { router } from '@inertiajs/react';
const Listing = (props) =>{

    const [listing, setListing] = useState(props.listing.data);
    const [links, setLinks] = useState(props.listing.links);
    const [activepage, setActivePage] = useState('');

    useEffect(()=>{
        props.listing.links && props.listing.links.map((l)=>{
            if(l.active){
                setActivePage(parseInt(l.label));
            }
        })
    },[props.listing])

    const restoreListing = id => () =>{
        Swal.fire({
            title: 'Are you sure want to Restore?',icon: 'warning',showCancelButton: true, confirmButtonText: 'Yes, Restore!'
          }).then((result) => {
            if (result.isConfirmed) {
                router.delete(route('restore-listing', id),{
                    onSuccess: () => {
                        setListing((list)=>{
                            return list.filter(list => list.id != id);
                        })
                        Swal.fire('Restored!','Business Restored Successfully','success');
                    },
                    preserveState:true
                });
            }
          })
    }

    return (
        <Authenticated auth={props.auth} errors={props.errors} current = {props.current}>
            <PageTitle title="View Trashed Listing" path="Trashed" pathurl="" />
            <Panel title="Manage Trashed Listing" md="12">
            <div className="table-responsive-md">
                <table className='table mb-0'>
                        <tbody>
                            <tr>
                                <th className='slno text-center'>#</th>
                                <th>Image</th>
                                <th>Business Name</th>
                                <th>User</th>
                                <th className='center'>Featured</th>
                                <th className='center'>City</th>
                                
                                <th className='center'>Active Plan</th>
                                <th className='center'>Rating</th>
                                <th className='text-center'>Action</th>
                            </tr>
                            
                            {
                                listing && listing.map((l, i)=>{
                                return <tr key={i}>
                                            <td>{i +  activepage * props.listing.per_page - 1}</td>
                                            <td style={{maxWidth:'80px'}}>
                                                <img style={{width:'50px'}} src={l.image} alt="" />
                                            </td>
                                            <td>
                                                {l.business_name} <br />
                                                <small>{l.email}</small>
                                            </td>
                                            <td>{ l.user }</td>
                                            <td className='center'>
                                                {
                                                    l.featured == 0 ? 
                                                        <i  className="bi text-primary fs-4 bi-toggle-off"></i> 
                                                    : 
                                                        <i className="bi text-primary fs-4 bi-toggle-on"></i>
                                                }
                                            </td>
                                            <td className='center'>{ l.city }</td>
                                            <td className='center'>{ l.plan }</td>
                                            <td className='center'>{ l.rating ? l.rating : 'No' } Star</td>
                                            <td className='text-center'>
                                                <button onClick={restoreListing(l.id)} className="btn btn-danger me-2 btn-xs"><i className="bi bi-recycle"></i> Restore</button>
                                            </td>
                                        </tr>
                                })
                            }
                        
                        </tbody>
                    </table>
            </div>
               
                { links.length === 3 ? '' :
                   <div className="card-footer">
                        <div className="row">
                            <div className="col-md-6 pt-2">
                                
                            </div>
                            <div className="col-md-6">
                                <Pagination links={links} />
                            </div>
                        </div>
                        
                    </div>
                }
            </Panel>
        </Authenticated>
    )
}
export default Listing