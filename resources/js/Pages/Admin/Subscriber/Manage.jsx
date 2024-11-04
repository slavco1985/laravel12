import React, { useEffect, useState } from 'react';
import Authenticated from '@/Layouts/Authenticated';
import PageTitle from '@/Components/PageTitle';
import Panel from '@/Components/Panel';
import Pagination from '@/Core/Pagination';
import Swal from 'sweetalert2';
import { router } from '@inertiajs/react';


const Manage = (props) =>{

    const [subscribers, setSubscribers] = useState(props.subscribers.data);
    const [links, setLinks] = useState(props.subscribers.links);
    const [activepage, setActivePage] = useState('');

    const removeMessage = id => () =>{
        Swal.fire({
            title: 'Are you sure want to Delete?',icon: 'warning',showCancelButton: true, confirmButtonText: 'Yes, delete!'
          }).then((result) => {
            if (result.isConfirmed) {
                router.delete(route('subscriber.destroy', id),{
                    onSuccess: () => {
                        setSubscribers((ps)=>{
                            return ps.filter(loc => loc.id != id);
                        })
                        Swal.fire('Deleted!','Subscriber Removed Successfully','success');
                    },
                    preserveState:true
                });
            }
        })
    }

    return (
        <Authenticated auth={props.auth} errors={props.errors} current = {props.current}>
            <PageTitle title="Manage Subscribers" path="" pathurl="" />
            <Panel title="Manage Subscribers" md="8">
            <div className="table-responsive-md">
                <table className='table mb-0'>
                    <tbody>
                        <tr>
                            <th className='text-center'>#</th>
                            <th>Email Address</th>
                            <th className='center' >Action</th>
                        </tr>
                        {
                            subscribers && subscribers.map((s, i)=>{
                                return <tr key={i}>
                                            <td className='center'>{i + props.subscribers.from}</td>
                                            <td>{ s.email }</td>
                                            <td className='center'>
                                                <button onClick={removeMessage(s.id)} className="btn btn-sm btn-danger"><i className='bi bi-trash'></i> Delete</button>
                                            </td>
                                        </tr>
                            })
                        }
                    </tbody>
                </table>
            </div>
                
                { 
                    links.length === 3 ? '' :
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
            </Panel>
        </Authenticated>
    )
}
export default Manage