import Authenticated from "@/Layouts/Authenticated"
import PageTitle from "@/Components/PageTitle"
import Panel from "@/Components/Panel"
import { useState } from "react"
import ActionColumn from "./Inc/ActionColum"
import { router } from "@inertiajs/react"


const ClaimRequests = (props) =>{

    const [requests, setRequests] = useState(props.requests.data);
    const [links, setLinks] = useState(props.requests.links);

    const takeAction = (i, action) => () =>{
        router.post(route('clime.action'),{action:action, id:requests[i].id},{
            onSuccess : () => {

            },
            preserveState:false
        })
    }

    return (
        <Authenticated auth={props.auth} errors={props.errors} current = {props.current}>
            <PageTitle title="View Claim Request" path="" pathurl="" />
            <Panel title="View Claim Request" md="12">
                <div className="table-responsive-md">
                    <table className='table mb-0'>
                        <tbody>
                            <tr>
                                <th className='text-center'>#</th>
                                <th>Image</th>
                                <th>Business Name</th>
                                <th>Requested By</th>
                                <th>User Email</th>
                                <th>User Mobile</th>
                                <th className="text-center" >Action</th>
                            </tr>
                            {
                                requests && requests.map((r, i)=>{
                                    return <tr key={i}>
                                                <td className='center'>{i + props.requests.from}</td>
                                                <td style={{maxWidth:'80px'}}>
                                                    <img style={{width:'50px'}} src={r.business_image} alt="" />
                                                </td>
                                                <td>{ r.business_name }</td>
                                                <td>{ r.user_name }  </td>
                                                <td>{ r.user_email }</td>
                                                <td>{ r.user_mobile}</td>
                                                <td className='text-center'>
                                                    <ActionColumn status={r.status} indx={i} takeAction={takeAction} />
                                                </td>
                                            </tr>
                                })
                            }
                        </tbody>
                    </table>
                </div>
            </Panel>
        </Authenticated>
    )
}
export default ClaimRequests