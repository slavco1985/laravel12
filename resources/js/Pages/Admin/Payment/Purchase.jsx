import React, { useEffect, useState } from 'react';
import Authenticated from '@/Layouts/Authenticated';
import PageTitle from '@/Components/PageTitle';
import Panel from '@/Components/Panel';
import Pagination from '@/Core/Pagination';
import Swal from 'sweetalert2';
import { router } from '@inertiajs/react';
import pickBy from 'lodash/pickBy';
import { usePrevious } from '@/Core/Previous';

const Purchase = (props) =>{

    const [pack, setPack] = useState(props.package);
    const [purchase, setPurchase] = useState(props.purchase.data);
    const [activepage, setActivePage] = useState('');
    const [links, setLinks] = useState(props.purchase.links);

    const [values, setValues] = useState({
        pack:  '',
        fdat:  '',
        tdat:  ''
    });

    const prevValues = usePrevious(values);

    useEffect(() => {
        if (prevValues) {
            const query = Object.keys(pickBy(values)).length ? pickBy(values) : { remember: 'forget' };
            router.get(route(route().current()), query, {
                replace: true,
                preserveState: true
            });
        }
    }, [values]);


    useEffect(()=>{
        setPurchase(props.purchase.data);
        setLinks(props.purchase.links);
        props.purchase.links && props.purchase.links.map((l)=>{
            if(l.active){
                setActivePage(parseInt(l.label));
            }
        })
    },[props.purchase])


    function handleChange(e) {
        const key = e.target.name;
        const value = e.target.value;
    
        setValues(values => ({
          ...values,
          [key]: value
        }));
    }

    return (
        <Authenticated auth={props.auth} errors={props.errors} current = {props.current}>
            <PageTitle title="Purchase History" path="Payment" pathurl="" />
            <Panel title="View Purchase History" md="10">
                <div className="row pt-2 pb-2 form-group m-0">
                    <div className="col-md-3 pe-1">
                    </div>
                    <div className="col-md-3 pe-1">
                        <select onChange={handleChange} value={values.pack} className='form-control' name="pack" id="">
                            <option value="">Filter by Package</option>
                            {
                                pack && pack.map((p, i)=>{
                                    return <option key={i} value={p.id}>{p.name}</option>
                                })
                            }
                        </select>
                    </div>
                    <div className="col-md-3 pe-1">
                        <input style={{height:'35px'}} onChange={handleChange} name="fdat" type="date" className='form-control' placeholder='Select From Date' />
                    </div>
                    <div className="col-md-3 ">
                    <input type="date" style={{height:'35px'}} onChange={handleChange} name="tdat"  className='form-control' placeholder='Select To Date' />
                    </div>
                </div>
                <div className="table-responsive-md">
                    <table className='table mb-0'>
                        <tbody>
                            <tr>
                                <th className='slno text-center'>#</th>
                                <th>User Name</th>
                                <th>Package Name</th>
                                <th className='text-center'>Transaction ID</th>
                                <th className='center'>Purchase Date</th>
                            </tr>
                            {
                                purchase && purchase.map((p, i)=>{
                                    return <tr key={i}>
                                        <td className='text-center'>{i + props.purchase.from}</td>
                                        <td>{p.name}</td>
                                        <td>{p.pack}</td>
                                        <td className='text-center'>{p.transaction_id}</td>
                                        <td className='text-center'>{p.dat}</td>
                                    </tr>
                                })
                            }
                        </tbody>
                    </table>
                </div>
                { links.length === 3 ? '' :
                   <div className="card-footer">
                        <div className="row">
                            <div className="col-md-12">
                                <Pagination links={links} />
                            </div>
                        </div>
                        
                    </div>
                }
            </Panel>
        </Authenticated>
    )
}
export default Purchase