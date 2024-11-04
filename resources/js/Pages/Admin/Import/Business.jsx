import Authenticated from '@/Layouts/Authenticated';
import PageTitle from '@/Components/PageTitle';
import ListImport from './Inc/ListImport';
import ImageUpload from './Inc/ImageUpload';
import Products from './Inc/Products';
import ProductImages from './Inc/ProductImages';

const Business = (props) =>{
    return (
        <Authenticated auth={props.auth} errors={props.errors} current = {props.current}>
            <PageTitle title="Import Business" path="Bulk Import" pathurl="" />

            <div className="row">
                <div className="col-md-6">
                    <ListImport err={props.errors} success={props.success} /> <br />
                    <Products err={props.errors} success={props.success} business={props.business} />
                </div>
                <div className="col-md-6">
                    <ImageUpload /> <br />
                    <ProductImages />
                 </div>
            </div>
            
         </Authenticated>
    )
}
export default Business