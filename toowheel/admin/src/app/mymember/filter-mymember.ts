import { Pipe, PipeTransform } from '@angular/core';
@Pipe({
   name: 'filterMyMember'
})
export class filterMyMember implements PipeTransform {
     transform(events: any[], value: string): any {
    if (events) {
      if (!value) {
        return events;
      } else {
        return events.filter(obj => obj.first_name.toLowerCase().indexOf(value.toLowerCase()) !== -1);
      }
    } else {
      return []
    }
  }
}